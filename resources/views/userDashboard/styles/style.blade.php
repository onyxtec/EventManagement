<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('/css/userDashboard.css')}}">
	<style>
	 .dropdown {
        position: absolute;
        right: 10px;
        /* background-color: #66D; */
        outline: none;
        opacity: 0;
        /* z-index: -1; */
        max-height: 0;
        transition: opacity 0.1s, z-index 0.1s, max-height: 5s;
      }
      .dropdown-container:focus {
        outline: none;
      }
      .dropdown-container:focus .dropdown {
        opacity: 1;
        z-index: 100;
        max-height: 100vh;
        transition: opacity 0.2s, z-index 0.2s, max-height: 0.2s;
      }
	</style>
	<title>AdminHub</title>
</head>