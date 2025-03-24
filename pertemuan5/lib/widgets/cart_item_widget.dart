import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:intl/intl.dart'; // Import untuk format mata uang
import '../models/item.dart';
import '../models/cart_model.dart';

class CartItemWidget extends StatelessWidget {
  final Item item;

  const CartItemWidget({super.key, required this.item});

  @override
  Widget build(BuildContext context) {
    final cart = Provider.of<CartModel>(context, listen: false);

    return Card(
      margin: const EdgeInsets.all(8),
      child: ListTile(
        title: Text(
          item.name,
          style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
        ),
        subtitle: Text(
          formatCurrency(item.price), // Format harga dalam Rupiah
          style: const TextStyle(fontSize: 16, color: Colors.grey),
        ),
        trailing: Row(
          mainAxisSize: MainAxisSize.min,
          children: [
            IconButton(
              icon: const Icon(Icons.remove_circle_outline),
              onPressed: () {
                cart.decreaseQuantity(item);
              },
            ),
            Text(
              "${item.quantity}",
              style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
            ),
            IconButton(
              icon: const Icon(Icons.add_circle_outline),
              onPressed: () {
                cart.add(item);
              },
            ),
          ],
        ),
      ),
    );
  }

  // Fungsi untuk memformat harga ke Rupiah
  String formatCurrency(double amount) {
    return NumberFormat.currency(
      locale: 'id_ID',
      symbol: 'Rp ',
      decimalDigits: 0,
    ).format(amount);
  }
}
