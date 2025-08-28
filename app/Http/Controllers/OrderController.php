<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $carts = Cart::where('buyer_id', Auth::id())->with('product')->get();
        if ($carts->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang Anda kosong.');
        }

        $total = $carts->sum(fn($cart) => $cart->product->price * $cart->quantity);

        return view('checkout', [
            'title' => 'Checkout Pesanan',
            'carts' => $carts,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|in:bank_transfer,cod',
        ]);

        $carts = Cart::where('buyer_id', Auth::id())->with('product')->get();
        if ($carts->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang Anda kosong.');
        }

        $total = $carts->sum(fn($cart) => $cart->product->price * $cart->quantity);

        DB::beginTransaction();
        try {
            $order = Order::create([
                'buyer_id' => Auth::id(),
                'total_price' => $total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'whatsapp_message_sent' => false,
            ]);

            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);
            }

            Cart::where('buyer_id', Auth::id())->delete();

            DB::commit();
            return redirect()->route('checkout.success', $order->id)->with('success', 'Pesanan berhasil dibuat! Silakan kirim ke penjual.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    public function success($orderId)
    {
        $order = Order::with(['orderItems.product'])->findOrFail($orderId);
        $carts = $order->orderItems; // Gunakan orderItems sebagai pengganti carts untuk tampilan
        $total = $order->total_price;

        return view('checkout', [
            'title' => 'Pesanan Berhasil',
            'carts' => $carts,
            'total' => $total,
            'order' => $order,
        ]);
    }

    public function sendWhatsApp($orderId)
    {
        $order = Order::with(['orderItems.product'])->findOrFail($orderId);
        $buyer = Auth::user();
        $seller = User::where('role', 'seller')->first();
        if (!$seller || !$seller->phone) {
            return redirect()->route('checkout.success', $orderId)->with('error', 'Nomor WhatsApp penjual tidak ditemukan.');
        }

        $message = "Halo {$seller->name},\nPesanan baru (#{$order->id}) dari {$buyer->name}:\n";
        foreach ($order->orderItems as $item) {
            $message .= "- {$item->product->name} (x{$item->quantity}): Rp " . number_format($item->price * $item->quantity, 0, ',', '.') . "\n";
        }
        $message .= "Total: Rp " . number_format($order->total_price, 0, ',', '.') . "\n";
        $message .= "Alamat: {$order->shipping_address}\n";
        $message .= "Metode Pembayaran: " . ($order->payment_method === 'bank_transfer' ? 'Transfer Bank' : 'Cash on Delivery') . "\n";
        $message .= "Silakan konfirmasi pesanan!";

        $encodedMessage = urlencode($message);
        $phone = preg_replace('/[^0-9]/', '', $seller->phone); // Hapus karakter non-numerik
        $whatsappUrl = "https://wa.me/{$phone}?text={$encodedMessage}";

        $order->update(['whatsapp_message_sent' => true]);

        return redirect($whatsappUrl)->with('success', 'Pesan WhatsApp berhasil dikirim ke penjual!');
    }
}