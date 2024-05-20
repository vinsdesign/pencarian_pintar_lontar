# import nltk
# import csv
# import sys
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from nltk.corpus import stopwords

# # Fungsi untuk memuat stop words dari file CSV
# def load_stop_words(csv_file):
#     stop_words = set()
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             stop_words.add(row['stopword'])
#     return stop_words

# # Path ke file CSV yang berisi stop words
# csv_file_path = 'stop_words.csv'

# # Memuat stop words dari file CSV
# stop_words = load_stop_words(csv_file_path)

# # Menggabungkan stop words dasar dan custom
# stop_words.update(stop_words)

# # Kamus sinonim sederhana
# synonyms = {
#     "upakara": "mantra",
#     "sejarah": "babad",
#     # Tambahkan pasangan kata asli dan sinonimnya di sini
# }

# def replace_keyword(word):
#     return synonyms.get(word, word)

# def tokenize_input(keyword, important_keywords):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = lower_keyword.split()

#         # Buat stemmer untuk bahasa Indonesia
#         factory = StemmerFactory()
#         stemmer = factory.create_stemmer()

#         # Hapus stop words
#         filtered_tokens = [token for token in tokens if token not in stop_words]

#         # Lakukan stemming pada setiap kata
#         stemmed_tokens = [stemmer.stem(token) for token in filtered_tokens]

#         ##################### lama
#         # Cari kata penting yang ada dalam input
#         important_tokens = [token for token in stemmed_tokens if token in important_keywords]

#         # Jika tidak ada kata penting yang ditemukan, ambil kata terakhir dari tokens
#         if not important_tokens:
#             important_tokens = [stemmed_tokens[-1]]

#         return important_tokens[0]  # Kembalikan kata penting pertama yang ditemukan
#         ##################### lama
        
#     except Exception as e:
#         # Tangani kesalahan dengan mencetak pesan kesalahan
#         print("Error:", str(e))
#         return None

# if __name__ == "__main__":
#     # Pastikan argumen keyword disediakan
#     if len(sys.argv) != 2:
#         print("Usage: python nlp_processing.py <keyword>")
#         sys.exit(1)

#     # Baca keyword dari argumen pertama script
#     keyword = sys.argv[1]

#     # Jalankan fungsi tokenize_input
#     processed_keyword = tokenize_input(keyword)

#     # Ganti kata-kata dengan sinonim jika perlu
#     replaced_keyword = replace_keyword(processed_keyword)

#     # Cetak hasil pemrosesan
#     if replaced_keyword is not None:
#         print(replaced_keyword)
        
        
import json
import sys
import os
import csv
import nltk
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from nltk.corpus import stopwords

# Fungsi untuk memuat stop words dari file CSV
def load_stop_words(csv_file):
    stop_words = set()
    with open(csv_file, mode='r', encoding='utf-8') as file:
        reader = csv.DictReader(file)
        for row in reader:
            stop_words.add(row['stopword'])
    return stop_words

# Path ke file CSV yang berisi stop words
csv_file_path = 'stop_words.csv'

# Memuat stop words dari file CSV
stop_words = load_stop_words(csv_file_path)

# Kamus sinonim sederhana
synonyms = {
    "upakara": "mantra",
    "sejarah": "babad",
    # Tambahkan pasangan kata asli dan sinonimnya di sini
}

def replace_keyword(word):
    return synonyms.get(word, word)

def tokenize_input(keyword, important_keywords):
    try:
        # Konversi keyword ke lowercase
        lower_keyword = keyword.lower()

        # Tokenisasi keyword menjadi kata-kata individual
        tokens = lower_keyword.split()

        # Buat stemmer untuk bahasa Indonesia
        factory = StemmerFactory()
        stemmer = factory.create_stemmer()

        # Hapus stop words
        filtered_tokens = [token for token in tokens if token not in stop_words]

        # Lakukan stemming pada setiap kata
        stemmed_tokens = [stemmer.stem(token) for token in filtered_tokens]

        # Cari kata penting yang ada dalam input
        important_tokens = [token for token in stemmed_tokens if token in important_keywords]

        # Jika tidak ada kata penting yang ditemukan, ambil kata terakhir dari tokens
        if not important_tokens:
            important_tokens = [stemmed_tokens[-1]]

        return important_tokens[0]  # Kembalikan kata penting pertama yang ditemukan

    except Exception as e:
        # Tangani kesalahan dengan mencetak pesan kesalahan
        print("Error:", str(e))
        return None

if __name__ == "__main__":
    # Pastikan argumen keyword disediakan
    if len(sys.argv) != 2:
        print("Usage: python processingNLP.py <temp_file>")
        sys.exit(1)

    # Baca nama file sementara dari argumen pertama script
    temp_file = sys.argv[1]

    try:
        # Baca data dari file sementara
        with open(temp_file, 'r', encoding='utf-8') as file:
            data = json.load(file)

        # Hapus file sementara setelah selesai membaca
        os.remove(temp_file)

        keyword = data['keyword']
        important_keywords = data['important_keywords']

        # Jalankan fungsi tokenize_input
        processed_keyword = tokenize_input(keyword, important_keywords)

        # Ganti kata-kata dengan sinonim jika perlu
        replaced_keyword = replace_keyword(processed_keyword)

        # Cetak hasil pemrosesan untuk diambil oleh PHP
        if replaced_keyword is not None:
            print(replaced_keyword)
        else:
            print("")
    except Exception as e:
        print("Error:", str(e))
        sys.exit(1)