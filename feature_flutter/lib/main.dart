import 'dart:async';
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

Future<Tour> fetchTour() async {
  final response = await http.get(
    Uri.parse('http://127.0.0.1:8001/api/tours/1'),
  );

  debugPrint('Response status: ${response.statusCode}');
  debugPrint('Response body: ${response.body}');

  if (response.statusCode == 200) {
    return Tour.fromJson(jsonDecode(response.body) as Map<String, dynamic>);
  } else {
    throw Exception('Failed to load tour');
  }
}

class Tour {
  // final int id;
  final String title;
  // final String description;
  // final double price;
  // final String date;

  const Tour({required this.title});

  factory Tour.fromJson(Map<String, dynamic> json) {
    return switch (json) {
      {'title': String title} => Tour(
        title: title
      ),
      _ => throw const FormatException('Failed to load tour.'),
    };
  }
}

void main() => runApp(const MyApp());

class MyApp extends StatefulWidget {
  const MyApp({super.key});

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  late Future<Tour> futureTour;

  @override
  void initState() {
    super.initState();
    futureTour = fetchTour();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Fetch Data Example',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
      ),
      home: Scaffold(
        appBar: AppBar(title: const Text('Fetch Data Example')),
        body: Center(
          child: FutureBuilder<Tour>(
            future: futureTour,
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                return Text(snapshot.data!.title);
              } else if (snapshot.hasError) {
                return Text('${snapshot.error}');
              }

              return const CircularProgressIndicator();
            },
          ),
        ),
      ),
    );
  }

}