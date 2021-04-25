@extends('layouts.main')

@section('content')
    <div class="btn-group">
        <div class="btn btn-default">Button</div>
        <div class="btn btn-primary">Primary</div>
        <div class="btn btn-success">Success</div>
        <div class="btn btn-warning">Warning</div>
        <div class="btn btn-danger">Danger</div>
    </div>

    <div class="btn-group">
        <div class="btn btn-default btn-mini">Button</div>
        <div class="btn btn-primary btn-mini">Primary</div>
        <div class="btn btn-success btn-mini">Success</div>
        <div class="btn btn-warning btn-mini">Warning</div>
        <div class="btn btn-danger btn-mini">Danger</div>
    </div>

    <div class="form">
        <div class="field-group">
            <label class="label" for="text">Label</label>
            <input type="text" class="field" name="text" id="text" placeholder="Enter text"/>
            <div class="hint">
                <span class="material-icons-outlined">info</span>
                Text field hint
            </div>
        </div>
        <div class="field-group required">
            <label class="label" for="text">Label</label>
            <input type="text" class="field" name="text" id="text" placeholder="Enter text (required)"/>
            <div class="hint">
                <span class="material-icons-outlined">info</span>
                Text field (required) hint
            </div>
        </div>
        <div class="field-group has-error">
            <label class="label" for="text">Label</label>
            <input type="text" class="field" name="text" id="text" placeholder="Enter text (error)"/>
            <div class="hint">
                <span class="material-icons-outlined">info</span>
                Text field (error) hint
            </div>
            <div class="error">
                <span class="material-icons-outlined">report_problem</span>
                Error text
            </div>
        </div>
    </div>
@endsection
