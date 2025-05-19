@extends('layouts.app')

@section('content')
<div class="container">
    <h2>CV Preview</h2>

    <form id="preview-form" method="POST" action="{{ route('ai.preview', $cv) }}">
        @csrf
        <input type="hidden" name="formatted" value="{{ $formatted }}">

        <div class="mb-3">
            <label>Select Template</label>
            <select name="template" id="template-select" class="form-control">
                <option value="template1">Classic</option>
                <option value="template2">Modern</option>
            </select>
        </div>

        <button class="btn btn-primary">Preview PDF</button>
    </form>

    <form id="save-form" method="POST" action="{{ route('ai.save', $cv) }}">
        @csrf
        <input type="hidden" name="formatted" value="{{ $formatted }}">
        <input type="hidden" name="template" id="template-hidden" value="template1">
        <button class="btn btn-success mt-3">Save & Download</button>
    </form>
</div>

<script>
    document.getElementById('template-select').addEventListener('change', function () {
        const selectedTemplate = document.getElementById('template-select').value;
        document.getElementById('template-hidden').value = selectedTemplate;
    });
</script>
@endsection
