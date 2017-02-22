#!/bin/bash

###
# Build Script
# Use this script to build theme assets,
# and perform any other build-time tasks.
##

# Clean up the working directory (useful when building from local dev files)
git clean -xdf

# Install PHP dependencies (WordPress, plugins, etc.)
composer install
