# Flutter Tours Feature

This project is a Flutter application that showcases a list of tours and provides detailed information about each tour. It interacts with a Laravel backend API to fetch tour data.

## Project Structure

```
flutter_tours
├── lib
│   ├── main.dart                  # Entry point of the application
│   ├── models
│   │   └── tour.dart              # Model class for Tour
│   ├── services
│   │   └── api_service.dart       # Service for API calls
│   ├── screens
│   │   ├── tours_list_screen.dart  # Screen displaying the list of tours
│   │   └── tour_detail_screen.dart # Screen displaying tour details
│   └── widgets
│       └── tour_card.dart         # Reusable widget for displaying tour summary
├── test
│   └── widget_test.dart           # Widget tests for the application
├── pubspec.yaml                   # Flutter project configuration
├── .gitignore                     # Files and directories to ignore by Git
└── README.md                      # Project documentation
```

## Setup Instructions

1. **Clone the repository:**
   ```
   git clone <repository-url>
   cd flutter_tours
   ```

2. **Install dependencies:**
   ```
   flutter pub get
   ```

3. **Run the application:**
   ```
   flutter run
   ```

## API Endpoints

- **Get all tours:** `GET /api/tours`
- **Get tour by ID:** `GET /api/tours/{id}`

## Usage

- The main screen displays a list of tours fetched from the API.
- Tapping on a tour will navigate to the detail screen, showing more information about the selected tour.

## Contributing

Feel free to submit issues or pull requests for improvements or bug fixes.