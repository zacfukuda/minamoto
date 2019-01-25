# CSS(Stylus) specification

In the preference of the developer of this theme, the theme comes with prewritten CSS([Stylus](http://stylus-lang.com/)).

You can remove prewritten stylus files by:

```bash
$ rm -r src/stylus
```

## Framework

By default, Minamoto does not include any CSS framework.

## Grid Design

The grid of this theme is mostly based on [Bootstrap](https://getbootstrap.com/docs/4.0/layout/grid/).

- **32px Gutter**<br>
The biggest difference is gutter width: 32px not 30px, giving 16px padding to each side of column.

- **Wider Padding on Container**<br>
The developer want the outer margin to be wider than the gutter. Hence, `padding: 0 40px` is set on `.container`, retaining the 1120px of content area at max. (In other words, the max width of `.container` is 1200px.)

## Responsive (Media Query)

By default, the theme contains three media queries:

1. **all** for all medias
2. **"(min-width:768px)"** for tablet or higher
3. **"(min-width:1024px)"** for PC or higher

**The theme avoids using inline media query** as much as possible. You can, however, easily write [Bootstrap-based media queries](https://getbootstrap.com/docs/4.0/layout/overview/) as follows.

```stylus
@media $xs
or
@media $sm
or
@media $md
or
@media $lg
or
@media $xl
  // your style here
```

The variables above are defined in `src/stylus/config/variable.styl`.