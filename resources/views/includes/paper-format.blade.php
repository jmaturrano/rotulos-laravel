<div class="wrap">
    <div class="columns no-border text-right" style="width: 100%;">{{ date('m') }} @if($user)/ {{ $user->code }} - {{ $user->name }} @endif</div>
</div>
@foreach($rows as $row)
    @php $column_with = 100/count($row); @endphp
    <div class="wrap">
        @foreach($row as $col)
            @php
                $size = '5em';
                if(strlen($col)>20){
                    $size = '4em';
                }
                if(strlen($col)>25){
                    $size = '3.5em';
                }
                if(strlen($col)>30){
                    $size = '2.8em';
                }
                if(strlen($col)>38){
                    $size = '2.3em';
                }
                $styles = 'width: '.$column_with.'%; ';
                $styles .= 'font-size: '.$size.'; ';
            @endphp
            <div class="columns text-center" style="{{ $styles }}">{{ substr($col, 0, 46) }}</div>
        @endforeach
    </div>
@endforeach
