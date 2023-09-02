@php
    $count = Widget::group($sidebar)->count();
    $columns = (int) (12 / $count);
@endphp
<div
    @class(['col-lg-' . $columns => $columns >= 3, 'col-6 col-lg-3 mb-30' => $columns < 3])
>
    @if($name = BaseHelper::clean($config['name']))
        <h4 class="text-heading-5">{!! $name !!}</h4>
    @endif
    @if($address = BaseHelper::clean($config['address']))
        <div class="mt-20 text-body-text color-gray-600 mb-20">{!! $address !!}</div>
    @endif
    @if($phone = BaseHelper::clean($config['phone']))
        <div class="mt-20 text-body-text color-gray-600" dir="ltr">{!! $phone !!}</div>
    @endif
    @if($email = BaseHelper::clean($config['email']))
        <div class="text-body-text color-gray-600">{!! $email !!}</div>
    @endif
</div>
