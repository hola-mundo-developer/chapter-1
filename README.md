# Chapter 1

## Before Dev

```sh
make build # Create Docker image with PHP 7.3

make install # Install PHP dependencies with composer
```

## Dev

```sh
make tests # Run all tests

make test ARGS="{{class_name}}::{{method_name}}" # Run specific test
```
