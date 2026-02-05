import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/tour.dart';

class ApiService {
  // Adjust baseUrl if backend runs on different host/port
  final String baseUrl;

  ApiService({required this.baseUrl});

  Future<List<Tour>> fetchTours() async {
    final uri = Uri.parse('$baseUrl/api/tours');
    final res = await http.get(uri);
    if (res.statusCode == 200) {
      final List data = json.decode(res.body) as List;
      return data.map((e) => Tour.fromJson(e as Map<String, dynamic>)).toList();
    }
    throw Exception('Failed to load tours: ${res.statusCode}');
  }

  Future<Tour> fetchTour(int id) async {
    final uri = Uri.parse('$baseUrl/api/tours/$id');
    final res = await http.get(uri);
    if (res.statusCode == 200) {
      final Map<String, dynamic> data = json.decode(res.body);
      return Tour.fromJson(data);
    }
    throw Exception('Failed to load tour: ${res.statusCode}');
  }
}
