# pdftotext sanitize

Sanitize output from pdftotext (or pdftohtml)

Actually pdftohtml is easier to copy-paste from, than pdftotext

Trim strings
Remove trailing '-'
Remove double newlines

# Install

    git clone https://github.com/diversen/pdftotext-sanitize

    cd pdftotext-sanitize

    composer update

    php index.php file-tosanitize.txt

Will echo to std output. 

