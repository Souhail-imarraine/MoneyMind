@component('mail::message')
# Alerte de Dépenses

Bonjour {{ auth()->user()->name }},

Une alerte a été déclenchée pour "{{ $alert->name }}".

@if($alert->alert_type === 'category')
**Catégorie**: {{ $alert->category->name }}
@else
**Dépenses totales**
@endif

- Seuil défini: {{ $alert->threshold_percentage }}%
- Pourcentage actuel: {{ number_format($percentage, 1) }}%
- Montant: {{ number_format($expenses, 2) }} DH

@component('mail::button', ['url' => route('dashboard')])
Voir mon tableau de bord
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
