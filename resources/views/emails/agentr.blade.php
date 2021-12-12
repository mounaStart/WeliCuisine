<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiamwelyResto</title>
</head>
<body>
    <h1>Bienvenue dans DiamwelyResto , clickez sur ce lien pour activer votre compte </h1>
    <style>
        .container {
            padding: 10px;
        }

        #contact {
            border-collapse: collapse;
            width: 100%;
        }

        #contact td,
        #contact th {
            border: 1px solid #ddd;
            padding: 8px;
            width: 30%;
        }

        #contact th {
            width: 10%;
        }

        #contact tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #contact tr:hover {
            background-color: #ddd;
        }

        #contact th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #8062c7;
            color: white;
        }
        .heading {
            background-color: lightgray;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1>Funda of Web IT: You a new enquiry from Contact Form</h1>
        </div>
        <?php $verifi_code = $agentr_data['verifi_code'] ; 
              $Id_Agent = $agentr_data['agentr_id'] ;
              ?>
             <h3>  {{ url('/confirm/'.$Id_Agent.'/'.$verifi_code.'/') }}</h3>
        <table id="customers">
            <tr>
                <th>Full Name</th>
                <td>{{ $agentr_data['name'] }}</td>
            </tr>
           
            <tr>
                <th>Email</th>
                <td>{{ $agentr_data['email'] }}</td>
            </tr>
            <tr>
                <th>Lien de validation</th>
              <?php $verifi_code = $agentr_data['verifi_code'] ; 
              $Id_Agent = $agentr_data['agentr_id'] ;
              ?>
                <td>{{ url('/confirm/'.$Id_Agent.'/'.$verifi_code) }}</td>
            </tr>
            
        </table>
    </div>
</body>

</html>
</body>
</html>