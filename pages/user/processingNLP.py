import json
import sys
import os
import csv
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory

# Fungsi untuk memuat stop words dari Sastrawi
def load_stop_words():
    factory = StopWordRemoverFactory()
    stop_words = set(factory.get_stop_words())
    return stop_words

# Memuat stop words dari Sastrawi
stop_words = load_stop_words()

# Fungsi untuk memuat exception words dari file CSV
def load_exception_words(csv_file):
    exception_words = set()
    with open(csv_file, mode='r', encoding='utf-8') as file:
        reader = csv.DictReader(file)
        for row in reader:
            exception_words.add(row['word'])
    return exception_words

# Path ke file CSV yang berisi exception words
exception_words_csv_file = 'exception_words.csv'

# Memuat exception words dari file CSV
exception_words = load_exception_words(exception_words_csv_file)

# Kamus sinonim sederhana
synonyms = {}

# Fungsi untuk memuat synonyms dari file CSV
def load_synonyms(csv_file):
    with open(csv_file, mode='r', encoding='utf-8') as file:
        reader = csv.DictReader(file)
        for row in reader:
            keywords = row['keyword'].split(',')
            for keyword in keywords:
                synonyms[keyword.strip()] = row['synonyms']

# Path ke file CSV yang berisi synonyms
synonyms_csv_file = 'persamaan_kata.csv'

# Memuat synonyms dari file CSV
load_synonyms(synonyms_csv_file)

def replace_keyword(word):
    return synonyms.get(word, word)

def process_text(keyword):
    try:
        # Konversi teks ke lowercase
        lower_text = keyword.lower()
        # Tokenisasi teks menjadi kata-kata individual
        tokens = lower_text.split()
        # Buat stemmer untuk bahasa Indonesia
        factory = StemmerFactory()
        stemmer = factory.create_stemmer()
        # Hapus stop words
        filtered_tokens = [token for token in tokens if token not in stop_words]
        # Lakukan stemming pada setiap kata kecuali kata dalam exception_words
        stemmed_tokens = [token if token in exception_words else stemmer.stem(token) for token in filtered_tokens]
        # Ganti kata dengan sinonim jika ada
        synonym_tokens = [replace_keyword(token) for token in stemmed_tokens]
        return synonym_tokens
    except Exception as e:
        # Tangani kesalahan dengan mencetak pesan kesalahan 
        print("Error:", str(e))
        return None

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python processingNLP.py <keyword>")
        sys.exit(1)

    keyword = sys.argv[1]

    processed_tokens = process_text(keyword)
    if processed_tokens is not None:
        print(" ".join(processed_tokens))
    else:
        print("")

# if __name__ == "__main__":
#     # Pastikan argumen keyword disediakan
#     if len(sys.argv) != 2:
#         print("Usage: python processingNLP.py <temp_file>")
#         sys.exit(1)

#     # Baca nama file sementara dari argumen pertama script
#     temp_file = sys.argv[1]

#     try:
#         # Baca data dari file sementara
#         with open(temp_file, 'r', encoding='utf-8') as file:
#             data = json.load(file)

#         # Hapus file sementara setelah selesai membaca
#         os.remove(temp_file)

#         text = data['keyword']

#         # Jalankan fungsi process_text
#         processed_tokens = process_text(text)

#         # Cetak hasil pemrosesan untuk diambil oleh PHP
#         if processed_tokens is not None:
#             print(" ".join(processed_tokens))
#         else:
#             print("")
#     except Exception as e:
#         print("Error:", str(e))
#         sys.exit(1)
