import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:flutter_tours/screens/tours_list_screen.dart';
import 'package:flutter_tours/screens/tour_detail_screen.dart';

void main() {
  testWidgets('ToursListScreen displays a list of tours', (WidgetTester tester) async {
    await tester.pumpWidget(MaterialApp(home: ToursListScreen()));

    expect(find.byType(ListView), findsOneWidget);
    expect(find.text('Tours'), findsOneWidget); // Assuming there's a title 'Tours'
  });

  testWidgets('TourDetailScreen displays tour details', (WidgetTester tester) async {
    await tester.pumpWidget(MaterialApp(home: TourDetailScreen(tourId: 1)));

    expect(find.byType(Column), findsOneWidget); // Assuming details are in a Column
    expect(find.text('Tour Details'), findsOneWidget); // Assuming there's a title 'Tour Details'
  });
}