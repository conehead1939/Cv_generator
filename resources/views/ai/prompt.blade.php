CV Title: {{ $cv->title }}
Summary: {{ $cv->summary }}

Experiences:
@foreach($cv->experiences as $e)
- {{ $e->position }} at {{ $e->company }} ({{ $e->start_date }} - {{ $e->end_date }})
  {{ $e->description }}
@endforeach

Educations:
@foreach($cv->educations as $ed)
- {{ $ed->degree }} from {{ $ed->school }} ({{ $ed->start_date }} - {{ $ed->end_date }})
  {{ $ed->description }}
@endforeach

Skills:
@foreach($cv->skills as $skill)
- {{ $skill->name }} ({{ $skill->level }})
@endforeach

Languages:
@foreach($cv->languages as $lang)
- {{ $lang->language }} ({{ $lang->level }})
@endforeach

Certifications:
@foreach($cv->certifications as $cert)
- {{ $cert->name }} by {{ $cert->organization }} (Issued: {{ $cert->issue_date }})
@endforeach
