
        
        
# import json
# import sys
# import os
# import csv
# import nltk
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

# # Kamus sinonim sederhana
# synonyms = {}

# # Fungsi untuk memuat synonyms dari file CSV
# def load_synonyms(csv_file):
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             keywords = row['keyword'].split(',')
#             for keyword in keywords:
#                 synonyms[keyword.strip()] = row['synonyms']

# # Path ke file CSV yang berisi synonyms
# synonyms_csv_file = 'persamaan_kata.csv'

# # Memuat synonyms dari file CSV
# load_synonyms(synonyms_csv_file)

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

#         # Cari kata penting yang ada dalam input
#         important_tokens = [token for token in stemmed_tokens if token in important_keywords]

#         # Jika tidak ada kata penting yang ditemukan, ambil kata terakhir dari tokens
#         if not important_tokens:
#             important_tokens = [stemmed_tokens[-1]]

#         return important_tokens[0]  # Kembalikan kata penting pertama yang ditemukan

#     except Exception as e:
#         # Tangani kesalahan dengan mencetak pesan kesalahan
#         print("Error:", str(e))
#         return None

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

#         keyword = data['keyword']
#         important_keywords = data['important_keywords']

#         # Jalankan fungsi tokenize_input
#         processed_keyword = tokenize_input(keyword, important_keywords)

#         # Ganti kata-kata dengan sinonim jika perlu
#         replaced_keyword = replace_keyword(processed_keyword)

#         # Cetak hasil pemrosesan untuk diambil oleh PHP
#         if replaced_keyword is not None:
#             print(replaced_keyword)
#         else:
#             print("")
#     except Exception as e:
#         print("Error:", str(e))
#         sys.exit(1)

# import json
# import sys
# import os
# import csv
# import nltk
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from nltk.corpus import stopwords
# from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory

# # Fungsi untuk memuat stop words dari file CSV dan Sastrawi
# def load_stop_words(csv_file):
#     stop_words = set()

#     # Muat stop words dari CSV
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             stop_words.add(row['stopword'])

#     # Muat stop words dari Sastrawi
#     factory = StopWordRemoverFactory()
#     sastrawi_stop_words = set(factory.get_stop_words())
#     stop_words.update(sastrawi_stop_words)

#     return stop_words

# # Path ke file CSV yang berisi stop words
# csv_file_path = 'StopWords.csv'

# # Memuat stop words dari file CSV dan Sastrawi
# stop_words = load_stop_words(csv_file_path)

# # Kamus sinonim sederhana
# synonyms = {}

# # Fungsi untuk memuat synonyms dari file CSV
# def load_synonyms(csv_file):
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             keywords = row['keyword'].split(',')
#             for keyword in keywords:
#                 synonyms[keyword.strip()] = row['synonyms']

# # Path ke file CSV yang berisi synonyms
# synonyms_csv_file = 'persamaan_kata.csv'

# # Memuat synonyms dari file CSV
# load_synonyms(synonyms_csv_file)

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

#         # Cari kata penting yang ada dalam input
#         important_tokens = [token for token in stemmed_tokens if token in important_keywords]

#         # Jika tidak ada kata penting yang ditemukan, ambil kata terakhir dari tokens
#         if not important_tokens:
#             important_tokens = [stemmed_tokens[-1]]

#         return important_tokens[0]  # Kembalikan kata penting pertama yang ditemukan

#     except Exception as e:
#         # Tangani kesalahan dengan mencetak pesan kesalahan
#         print("Error:", str(e))
#         return None

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

#         keyword = data['keyword']
#         important_keywords = data['important_keywords']

#         # Jalankan fungsi tokenize_input
#         processed_keyword = tokenize_input(keyword, important_keywords)

#         # Ganti kata-kata dengan sinonim jika perlu
#         replaced_keyword = replace_keyword(processed_keyword)

#         # Cetak hasil pemrosesan untuk diambil oleh PHP
#         if replaced_keyword is not None:
#             print(replaced_keyword)
#         else:
#             print("")
#     except Exception as e:
#         print("Error:", str(e))
#         sys.exit(1)


# import json
# import sys
# import os
# import csv
# import nltk
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory

# # Fungsi untuk memuat stop words dari Sastrawi
# def load_stop_words():
#     factory = StopWordRemoverFactory()
#     stop_words = set(factory.get_stop_words())
#     return stop_words

# # Memuat stop words dari Sastrawi
# stop_words = load_stop_words()

# # Fungsi untuk memuat exception words dari file CSV
# def load_exception_words(csv_file):
#     exception_words = set()
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             exception_words.add(row['word'])
#     return exception_words

# # Path ke file CSV yang berisi exception words
# exception_words_csv_file = 'exception_words.csv'

# # Memuat exception words dari file CSV
# exception_words = load_exception_words(exception_words_csv_file)

# # Kamus sinonim sederhana
# synonyms = {}

# # Fungsi untuk memuat synonyms dari file CSV
# def load_synonyms(csv_file):
#     with open(csv_file, mode='r', encoding='utf-8') as file:
#         reader = csv.DictReader(file)
#         for row in reader:
#             keywords = row['keyword'].split(',')
#             for keyword in keywords:
#                 synonyms[keyword.strip()] = row['synonyms']

# # Path ke file CSV yang berisi synonyms
# synonyms_csv_file = 'persamaan_kata.csv'

# # Memuat synonyms dari file CSV
# load_synonyms(synonyms_csv_file)

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

#         # Lakukan stemming pada setiap kata kecuali kata dalam exception_words
#         stemmed_tokens = [token if token in exception_words else stemmer.stem(token) for token in filtered_tokens]

#         # Cari kata penting yang ada dalam input
#         important_tokens = [token for token in stemmed_tokens if token in important_keywords]

#         # Jika tidak ada kata penting yang ditemukan, ambil kata terakhir dari tokens
#         if not important_tokens:
#             important_tokens = [stemmed_tokens[-1]]

#         return important_tokens[0]  # Kembalikan kata penting pertama yang ditemukan

#     except Exception as e:
#         # Tangani kesalahan dengan mencetak pesan kesalahan
#         print("Error:", str(e))
#         return None

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

#         keyword = data['keyword']
#         important_keywords = data['important_keywords']

#         # Jalankan fungsi tokenize_input
#         processed_keyword = tokenize_input(keyword, important_keywords)

#         # Ganti kata-kata dengan sinonim jika perlu
#         replaced_keyword = replace_keyword(processed_keyword)

#         # Cetak hasil pemrosesan untuk diambil oleh PHP
#         if replaced_keyword is not None:
#             print(replaced_keyword)
#         else:
#             print("")
#     except Exception as e:
#         print("Error:", str(e))
#         sys.exit(1)

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

        # Lakukan stemming pada setiap kata kecuali kata dalam exception_words
        stemmed_tokens = [token if token in exception_words else stemmer.stem(token) for token in filtered_tokens]

        # Cari kata penting yang ada dalam input
        important_tokens = [token for token in stemmed_tokens if token in important_keywords]

        # Jika tidak ada kata penting yang ditemukan, cari sinonim
        if not important_tokens:
            synonym_tokens = [replace_keyword(token) for token in stemmed_tokens]
            important_tokens = [token for token in synonym_tokens if token != stemmed_tokens[synonym_tokens.index(token)]]

        # Jika tidak ada sinonim yang ditemukan, ambil kata terakhir dari tokens
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
