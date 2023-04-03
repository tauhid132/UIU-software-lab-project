<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
        @yield('main-body')
    </div>
    @vite(['resources/js/app.js'])
    <script src="{{ asset('theme/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('theme/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('theme/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
    
    <script>
       
        function calculate(){
            
            var food = document.getElementById("food_name").value
            var unit = document.getElementById("unit").value
            var amount = document.getElementById("amount").value
            alert(food)
            var query = amount+''+unit+' '+food
            $.ajax({
                method: 'GET',
                url: 'https://api.api-ninjas.com/v1/nutrition?query=' + query,
                headers: { 'X-Api-Key': 'I3sov+4Ec2CrXQK9mauAQQ==PzCNNH5swQ7U6yde'},
                contentType: 'application/json',
                success: function(result) {
                    document.getElementById("calories").value = result[0].calories
                    document.getElementById("carbs").value = result[0].carbohydrates_total_g
                    document.getElementById("fat").value = result[0].fat_total_g
                    document.getElementById("protien").value = result[0].protein_g

                    console.log(result);
                },
                error: function ajaxError(jqXHR) {
                    console.error('Error: ', jqXHR.responseText);
                }
                
            });
            
        }
    </script>
</body>
</html>