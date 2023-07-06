<!DOCTYPE html>
<html>
<head>
    <title>Rapport de présence</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  font-size: 12px;
}

h4 {
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  border: 1px solid #000;
  padding: 8px;
  text-align: center;
}

table th {
  background-color: #f2f2f2;
}

table td:last-child {
  text-transform: capitalize;
}

table td:last-child::first-letter {
  text-transform: uppercase;
}

table td:last-child:last-letter {
  text-transform: lowercase;
}



.table-heading {
  font-weight: bold;
}

.present {
  color: green;
}

.absent {
  color: red;
}

    </style>
</head>
<body>
    <h4>Rapport de présence du mois: {{ $month_year }}</h4>
    <h4>Elève: {{ $eleve->Nom }} {{ $eleve->Prenom }}</h4>
    <br>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Séance</th>
                <th>Créneau horaire</th>
                <th>Matière</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presences as $presence)
                @php
                    $seance = $seances->firstWhere('ID_Seance', $presence->ID_Seance);
                    $matiere = $matieres->firstWhere('ID_Matiere', $seance->ID_Matiere);
                @endphp
                <tr>
                    <td>{{ date('d/m/Y', strtotime($presence->created_at)) }}</td>
                    <td>{{ $seance->Type }}</td>
                    <td>{{ $seance->Heure }}</td>
                    <td>{{ $matiere->Nom }}</td>
                    @if($presence->etat == 1)
                        <td class="present">présent</td>
                    @else
                        <td class="absent">absent</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

