class Tour {
  final int id;
  final String? title;
  final String? description;

  Tour({required this.id, this.title, this.description});

  factory Tour.fromJson(Map<String, dynamic> json) {
    return Tour(
      id: json['id'] is int ? json['id'] : int.parse(json['id'].toString()),
      title: json['title'],
      description: json['description'],
    );
  }
}
