#!/bin/bash
files=(*.pdf)
for f in "$files"; do

for i in `seq 1 20000`; do
  cp "$f" "`basename "$f" .pdf`_$i.pdf"
done
done

