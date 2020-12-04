@extends('indigo-layout::main')

@section('meta_title', config('app.name'))
@section('meta_description', config('app.name') . ' system')

@push('head')

@endpush

@section('title')
Home
@endsection

@section('create_button')

@endsection

@section('pagemap')

@endsection

@section('content')



















{{--    <virtual-tour name="welcome" :steps="[--}}
{{--                {--}}
{{--                    el: 'h1:nth-child(1)',--}}
{{--                    message: 'Test message. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit doloribus ab molestiae vero ratione eum quia fuga assumenda laborum maxime eius, commodi officiis delectus aspernatur ducimus explicabo perspiciatis error magnam ea nemo. Possimus corrupti veritatis laboriosam similique hic officiis ducimus, amet magnam suscipit esse culpa'--}}
{{--                },--}}
{{--                {--}}
{{--                    el: 'h2:nth-child(1)',--}}
{{--                    fade: false,--}}
{{--                    message: 'Test message. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit doloribus ab molestiae vero ratione eum quia fuga assumenda laborum maxime eius, commodi officiis delectus aspernatur ducimus explicabo perspiciatis error magnam ea nemo. Possimus corrupti veritatis laboriosam similique hic officiis ducimus, amet magnam suscipit esse culpa'--}}
{{--                },--}}
{{--                {--}}
{{--                    el: 'div.uk-container img.uk-align-right',--}}
{{--                    message: 'Test message 2'--}}
{{--                },--}}
{{--                {--}}
{{--                    position: 'right',--}}
{{--                    message: 'This is a center message!'--}}
{{--                }--}}
{{--            ]"></virtual-tour>--}}

{{--    <virtual-tour name="welcome1" :fade="false" :steps="[--}}
{{--                {--}}
{{--                    el: 'h1:nth-child(1)',--}}
{{--                    message: 'From second tour!'--}}
{{--                },--}}
{{--                {--}}
{{--                    el: 'h2:nth-child(1)',--}}
{{--                    message: 'From second tour too!',--}}
{{--                    fade: true--}}
{{--                }--}}
{{--            ]"></virtual-tour>--}}
@endsection

@section('modals')

@endsection
