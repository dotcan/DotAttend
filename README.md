# About DotAttend

DotAttend is a website built with the [Laravel](https://laravel.com) Framework, that acts as a backbone for our
University's _Embedded Systems_ course project, which is an RFID scanner for marking attendances in various
courses/classes.

## Requirements

- PHP >= 8.1
- Composer
- Database _(We're using SQLite in this case)_

## Deployment

To deploy this project run

```bash
$ composer create-project --prefer-dist
$ npm run build
$ php artisan migrate:fresh --seed
$ php artisan serve
```

## API Reference

> **NOTE:** The API has few routes that are accessed from the RFID scanner,
> thus we don't actually require an extensive and full REST API for our use case.
>> Since it's a simple API, we won't be using API keys.

#### Get RFID Scanner

```http
  GET /api/rfid/{id}
```

| Parameter | Type  | Description  |
|:----------|:------|:-------------|
| `id`      | `int` | **Required** |

#### Create RFID Scanner

```http
  POST /api/rfid
```

Create a new RFID scanner instance and return it.

#### Get all attendances

```http
  GET /api/attendances
```

#### Mark Attendance

```http
  POST /api/attendances
```

| Body Parameter | Type     | Description                 |
|:---------------|:---------|:----------------------------|
| `rfid_scanner` | `int`    | **Required**. ID of scanner |
| `rfid_tag`     | `string` | **Required**. Scanned tag   |

Creates a new `Attendance` for the user that's has a linked card with the `rfid_tag` supplied, if user is not already
marked as attended.

`rfid_scanner` is used to determine which course, class, and schedule the RFID scanner belongs to.
