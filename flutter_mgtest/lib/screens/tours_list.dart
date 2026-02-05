import 'package:flutter/material.dart';
import '../models/tour.dart';
import '../services/api_service.dart';
import 'tour_detail.dart';

class ToursListScreen extends StatefulWidget {
  final ApiService api;
  const ToursListScreen({super.key, required this.api});

  @override
  State<ToursListScreen> createState() => _ToursListScreenState();
}

class _ToursListScreenState extends State<ToursListScreen> {
  late Future<List<Tour>> _future;

  @override
  void initState() {
    super.initState();
    _future = widget.api.fetchTours();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Tours')),
      body: FutureBuilder<List<Tour>>(
        future: _future,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return const Center(child: CircularProgressIndicator());
          }
          if (snapshot.hasError) {
            return Center(child: Text('Error: ${snapshot.error}'));
          }
          final tours = snapshot.data ?? [];
          if (tours.isEmpty) {
            return const Center(child: Text('No tours found'));
          }
          return ListView.builder(
            itemCount: tours.length,
            itemBuilder: (context, index) {
              final t = tours[index];
              return ListTile(
                title: Text(t.title ?? 'Untitled'),
                subtitle: t.description != null ? Text(t.description!) : null,
                onTap: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                        builder: (_) => TourDetailScreen(api: widget.api, tourId: t.id)),
                  );
                },
              );
            },
          );
        },
      ),
    );
  }
}
