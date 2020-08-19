# Nova Tick Filter


# Installation

You can install the package via composer:

```
composer require sunchain_fr/nova-tick-filter
```

## Basic Usage

Create a filter as usual and extend the `SunchainFr\TickFilter\TickFilter` class

```php
use SunchainFr\TickFilter\TickFilter;

class MyFilter extends TickFilter {

    public function apply(Request $request, $query, $values)
    {
        // $values will always be an array
    }
    
    public function options(Request $request)
    {
        return [
           'Display Text 1' => 'value-1',
           'Display Text 2' => 'value-2'
        ];
    }

}
```

and use it as usual on the filters methods within your resource class:

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            new MyFilter()
        ];
    }

}
```

By default multiple items can be selected, you can restrict it to a single item at time by calling `->single()`

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            (new MyFilter())->single()
        ];
    }

}
```

Additionally you can customize the mode the filter is displayed, by default it wraps to show all pills at once, however
there is also a drag mode:

![TickFilter in Action](https://raw.githubusercontent.com/dcasia/nova-tick-filter/master/screenshots/demo-2.png)

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            (new MyFilter())->dragMode()
        ];
    }

}
```

The original source of this code is : https://github.com/dcasia/nova-pill-filter

It is an adaptation for my own use. It is made to be used with laravel nova dashboard, it has no use as a Nova Filter 

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-tick-filter/master/LICENSE) for more information.
