# Laravel component to create gorgeous Charts.css charts.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/laravel-charts-css.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-charts-css)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-charts-css/run-tests?label=tests)](https://github.com/maartenpaauw/laravel-charts-css/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-charts-css/Check%20&%20fix%20styling?label=code%20style)](https://github.com/maartenpaauw/laravel-charts-css/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/laravel-charts-css.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-charts-css)

This library will help you generate CSS only charts based on the **Charts.css** library.

## Installation

You can install the package via composer:

```bash
composer require maartenpaauw/laravel-charts-css
```

## Usage

Here's how you can create a chart:

```bash
php artisan make:chart MedalsChart
```

This will generate a chart component within the `View/Components` namespace.

```php
<?php

namespace DummyNamespace;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;

class MedalsChart extends Chart
{
    protected function id(): string
    {
        return 'medals-chart';
    }

    protected function heading(): string
    {
        return __('Medals Chart');
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Country', ['Gold', 'Silver', 'Bronze']),
            [
                new Dataset([
                    new Entry('46', 46),
                    new Entry('37', 37),
                    new Entry('38', 38),
                ], 'USA'),
                new Dataset([
                    new Entry('27', 27),
                    new Entry('23', 23),
                    new Entry('17', 17),
                ], 'GBR'),
                new Dataset([
                    new Entry('26', 26),
                    new Entry('18', 18),
                    new Entry('26', 26),
                ], 'CHN'),
            ]
        );
    }
}
```

Within your blade file you can display the chart by adding:

```html
<x-medals-chart/>
```

### Advanced

There is a lot more to configure.

#### Modifications

By overwriting the `modifications()` method you can add multiple modifications.

Out of the box the `ShowHeading` modification will be applied when the heading is present
and the modifications `Multiple` and `ShowLabels` are applied when there are multiple datasets configured.

##### Data(sets) spacing

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new DataSpacing(10))
        ->add(new DatasetsSpacing(20));
}
```

By adding `DatasetsSpacing` or `DataSpacing` you can configure the space between the data entries. Both constructors accept a number between 1 and 20 defining the amount of space.

##### Hide data

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new HideData());
}
```

The `HideData` modification will hide the display value of each entry.
The value will still be printed to the screen, but it is hidden by CSS.
This will respect screenreaders.

##### Show data on hover.

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowDataOnHover());
}
```

The `ShowDataOnHover` modification will hide the data the same way as the `HideData` modification.
The big difference is it will show the data when you hover it.

##### Label alignment

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new LabelsAlignStart())
        ->add(new LabelsAlignCenter())
        ->add(new LabelsAlignEnd());
}
```

You can configure the label alignment by adding one of the following modifications: `LabelsAlignStart`, `LabelsAlignCenter` or `LabelsAlignRight`.

##### Multiple

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new Multiple());
}
````

When displaying multiple datasets the modification `Multiple` needs to be added.
Out of the box it is automatically add if there are multiple datasets.

##### Reverse

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ReverseData())
        ->add(new ReverseDatasets())
        ->add(new ReverseOrientation());
}
```

If you want to reverse the data, datasets or the orientation you can add the modifications: `ReverseData`, `ReverseDatasets` or/and `ReverseOrientation`.

##### Axes

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowDataAxes())
        ->add(new ShowPrimaryAxis())
        ->add(new ShowSecondaryAxes());
}
```

By default, no axes are shown. You can show the primary axis by adding the `ShowPrimaryAxis`.
Same goes for the `ShowDataAxes`.

To display the secondary axes you can add the `ShowSecondaryAxes` modification.
The constructor accepts the amount of axes (with a limit of 10) as the first parameter.

##### Show heading

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowHeading());
}
````

The heading (table caption) will always be printed to the screen to respect screenreaders,
but it will be hidden with CSS by default. If you want to display the heading you need to add the `ShowHeading` modification.
This modification will be added automatically when the heading is present.

##### Show labels

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowLabels());
}
````

The labels will always be printed to the screen to respect screenreaders,
but they are hidden with CSS by default. If you want to display the labels you need to add the `ShowLabels` modification.

##### Stacked

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new Stacked());
}
````

If you want to stack multiple datasets you can add the `Stacked` modification.

##### Did I miss adding a modification?

```php
protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new CustomModification('foo'));
}
````

Feel free to create a pull request or submitting an issue.
In the meanwhile you can add it easily by adding a `CustomModification`.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Maarten Paauw](https://github.com/maartenpaauw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
