<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #4F46E5;
            color: white;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
        }
        .goal-details {
            margin: 20px 0;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4F46E5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Félicitations!</h1>
    </div>

    <div class="content">
        <p>Bonjour,</p>

        <p>Nous sommes ravis de vous annoncer que vous avez atteint votre objectif d'épargne!</p>

        <div class="goal-details">
            <h2>{{ $goal->name }}</h2>
            <p><strong>Montant atteint:</strong> {{ $goal->current_amount }} DH</p>
            <p><strong>Objectif initial:</strong> {{ $goal->goal_amount }} DH</p>
        </div>

        <p>Continuez sur cette belle lancée! Pourquoi ne pas définir un nouvel objectif?</p>

        <a href="{{ url('/goals') }}" class="button">Voir mes objectifs</a>

        <p style="margin-top: 30px;">
            Cordialement,<br>
            L'équipe MoneyMind
        </p>
    </div>
</body>
</html>
