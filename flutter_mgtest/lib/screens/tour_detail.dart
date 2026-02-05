import 'package:flutter/material.dart';
import '../models/tour.dart';
import '../services/api_service.dart';

class TourDetailScreen extends StatefulWidget {
  final ApiService api;
  final int tourId;
  const TourDetailScreen({super.key, required this.api, required this.tourId});

  @override
  State<TourDetailScreen> createState() => _TourDetailScreenState();
}

class _TourDetailScreenState extends State<TourDetailScreen> {
  late Future<Tour> _future;

  @override
  void initState() {
    super.initState();
    _future = widget.api.fetchTour(widget.tourId);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Tour')),
      body: FutureBuilder<Tour>(
        future: _future,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return const Center(child: CircularProgressIndicator());
          }
          if (snapshot.hasError) {
            return Center(child: Text('Error: ${snapshot.error}'));
          }
          final tour = snapshot.data!;
          return Padding(
            padding: const EdgeInsets.all(16.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(tour.title ?? 'Untitled', style: Theme.of(context).textTheme.headlineSmall),
                const SizedBox(height: 12),
                Text(tour.description ?? 'No description', style: Theme.of(context).textTheme.bodyMedium),
              ],
            ),
          );
        },
      ),
    );
  }
}
