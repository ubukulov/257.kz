<div class="col-md-4 mb-4">
    <div class="fr_view">
        <div class="fr_image">
            <img src="{{ $franchise->image() }}" alt="">
        </div>
        <div class="fr_title">{{ $franchise->title }}</div>
        <div class="fr_address"><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $franchise->address }}</div>
        @if(!empty($franchise->phones))
            <div class="fr_phones">
                <i class="fas fa-mobile-alt"></i>&nbsp;{!! $franchise->getPhones() !!}
            </div>
        @endif
    </div>
</div>