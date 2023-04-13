#!/usr/bin/env bash

npm run build
docker build --platform linux/amd64 -t r.knspr.space/xyz:latest .
docker push r.knspr.space/xyz:latest
