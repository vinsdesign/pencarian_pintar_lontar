# import nltk
# import sys
# from nltk.stem import PorterStemmer
# from nltk.corpus import stopwords

# def tokenize_input(keyword):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = nltk.word_tokenize(lower_keyword)

#         # Pilih stemmer atau lemmatizer berdasarkan kebutuhan
#         stemmer = PorterStemmer()

#         # Load stop words bahasa Indonesia
#         stop_words = set(stopwords.words('indonesian'))

#         # Lakukan stemming pada kata-kata
#         stemmed_tokens = [stemmer.stem(token) for token in tokens]

#         # Hapus stop words
#         filtered_tokens = [token for token in stemmed_tokens if token not in stop_words]

#         # Gabungkan token yang sudah diproses menjadi satu string
#         processed_keyword = " ".join(filtered_tokens)

#         if not processed_keyword:
#             raise ValueError("Keyword processing resulted in an empty string.")

#         return processed_keyword
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

#     # Cetak hasil pemrosesan
#     if processed_keyword is not None:
#         print(processed_keyword)


# Berdasarkan Kata Terakhir saja
# import nltk
# import sys
# from nltk.stem import PorterStemmer
# from nltk.corpus import stopwords

# def tokenize_input(keyword):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = nltk.word_tokenize(lower_keyword)

#         # Pilih stemmer atau lemmatizer berdasarkan kebutuhan
#         stemmer = PorterStemmer()

#         # Load stop words bahasa Indonesia
#         stop_words = set(stopwords.words('indonesian'))

#         # Hapus stop words
#         filtered_tokens = [token for token in tokens if token not in stop_words]

#         # Ambil kata terakhir dari tokens
#         last_word = filtered_tokens[-1]

#         # Lakukan stemming pada kata terakhir
#         stemmed_last_word = stemmer.stem(last_word)

#         return stemmed_last_word
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

#     # Cetak hasil pemrosesan
#     if processed_keyword is not None:
#         print(processed_keyword)

# for i in range(1, 101):
#     important_keywords.add(str(i));

# berdasarkan kata penting
# import nltk
# import sys
# from nltk.stem import PorterStemmer
# from nltk.corpus import stopwords

# # Kata-kata penting yang ingin ditampilkan
# important_keywords = {
#   "mantra", "itihasa","weda", "lelampahan","agama","wariga","babad","tantri","pamancangah","satua","cerita", "cerita wayang","sesana/moral","moral","daun rontar", "3.5","50","weda","karangasem","gianyar","buleleng","singaraja","tabanan","negara","bangli", "denpasar",
#   }  # Anda dapat menambahkan kata-kata penting lainnya di sini 

# # Kamus sinonim sederhana
# synonyms = {
#     "upakara": ["upacara", "weda"],
    
# }

# def find_synonym(word):
#     # Mencari sinonim dari kata yang diberikan.
#     # Jika sinonim ditemukan, mengembalikan sinonim pertama yang ditemukan.
#     # Jika tidak, mengembalikan kata asli.
#     for key, value in synonyms.items():
#         if word in value:
#             return key
#     return word

# def tokenize_input(keyword):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = nltk.word_tokenize(lower_keyword)

#         # Pilih stemmer atau lemmatizer berdasarkan kebutuhan
#         stemmer = PorterStemmer()

#         # Load stop words bahasa Indonesia
#         stop_words = set(stopwords.words('indonesian'))

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
#         print("Usage: python nlp_processing.py <keyword>")
#         sys.exit(1)

#     # Baca keyword dari argumen pertama script
#     keyword = sys.argv[1]

#     # Jalankan fungsi tokenize_input
#     processed_keyword = tokenize_input(keyword)

#     # Cetak hasil pemrosesan
#     if processed_keyword is not None:
#         print(processed_keyword)





# berdasarkan kata penting
# import nltk
# import sys
# from nltk.stem import PorterStemmer
# from nltk.corpus import stopwords
# # Kata-kata penting yang ingin ditampilkan
# important_keywords = {
#   "mantra", "itihasa","weda", "lelampahan","agama","wariga","babad","tantri","pamancangah","satua","cerita", "cerita wayang","sesana/moral","moral","daun rontar", "3.5","50","weda","karangasem","gianyar","buleleng","singaraja","tabanan","negara","bangli", "denpasar",
#   }  # Anda dapat menambahkan kata-kata penting lainnya di sini 

# # Kamus sinonim sederhana
# # Kamus sinonim
# synonyms = {
#     "upakara": "mantra",
#     "sejarah": "babad",
#     # Tambahkan pasangan kata asli dan sinonimnya di sini
# }

# def replace_keyword(word):
#     return synonyms.get(word, word)

# def tokenize_input(keyword):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = nltk.word_tokenize(lower_keyword)

#         # Pilih stemmer atau lemmatizer berdasarkan kebutuhan
#         stemmer = PorterStemmer()

#         # Load stop words bahasa Indonesia
#         stop_words = set(stopwords.words('indonesian'))

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

# import sys
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from nltk.corpus import stopwords

# # Kata-kata penting yang ingin ditampilkan
# important_keywords = {
#     "mantra", "itihasa", "weda", "lelampahan", "agama", "wariga", "babad", "tantri", 
#     "pamancangah", "satua", "cerita", "cerita wayang", "sesana/moral", "moral", "daun rontar", 
#     "3.5", "50", "karangasem", "gianyar", "buleleng", "singaraja", "tabanan", "negara", 
#     "bangli", "denpasar"
# }

# # Kamus sinonim sederhana
# synonyms = {
#     "upakara": "mantra",
#     "sejarah": "babad",
#     # Tambahkan pasangan kata asli dan sinonimnya di sini
# }

# def replace_keyword(word):
#     return synonyms.get(word, word)

# def tokenize_input(keyword):
#     try:
#         # Konversi keyword ke lowercase
#         lower_keyword = keyword.lower()

#         # Tokenisasi keyword menjadi kata-kata individual
#         tokens = lower_keyword.split()

#         # Load stop words bahasa Indonesia
#         stop_words = set(stopwords.words('indonesian'))

#         # Hapus stop words
#         filtered_tokens = [token for token in tokens if token not in stop_words]

#         # Buat stemmer untuk bahasa Indonesia
#         factory = StemmerFactory()
#         stemmer = factory.create_stemmer()

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


# menambahkan stop words
# import nltk
# import sys
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from nltk.corpus import stopwords

# # Memuat stop words bahasa Indonesia dari NLTK
# stop_words = set(stopwords.words('indonesian'))

# # Menambahkan stop words khusus yang relevan dengan naskah lontar
# custom_stop_words = {
#     'lontar', 'naskah', 'teks', 'halaman', 'pada', 'yang', 'dan', 'dari', 'di', 'ke', 'untuk', 'adalah', 'oleh'
#     # Tambahkan kata-kata lain yang tidak relevan untuk pencarian
# }

# # Menggabungkan stop words dasar dan custom
# stop_words.update(custom_stop_words)

# # Kata-kata penting yang ingin ditampilkan
# important_keywords = {
#     "mantra", "itihasa", "weda", "lelampahan", "agama", "wariga", "babad", "tantri",
#     "pamancangah", "satua", "cerita", "cerita wayang", "sesana/moral", "moral", "daun rontar",
#     "3.5", "50", "karangasem", "gianyar", "buleleng", "singaraja", "tabanan", "negara",
#     "bangli", "denpasar"
# }

# # Kamus sinonim sederhana
# synonyms = {
#     "upakara": "mantra",
#     "sejarah": "babad",
#     # Tambahkan pasangan kata asli dan sinonimnya di sini
# }

# def replace_keyword(word):
#     return synonyms.get(word, word)

# def tokenize_input(keyword):
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





# # menambahkan region
# import nltk
# import sys
# from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
# from nltk.corpus import stopwords

# # Unduh stop words bahasa Indonesia jika belum terunduh
# nltk.download('stopwords')

# # Memuat stop words bahasa Indonesia dari NLTK
# stop_words = set(stopwords.words('indonesian'))

# # Menambahkan stop words khusus yang relevan dengan naskah lontar
# custom_stop_words = {
#     'lontar', 'naskah', 'teks', 'halaman', 'pada', 'yang', 'dan', 'dari', 'di', 'ke', 'untuk', 'adalah', 'oleh'
# }

# # Menggabungkan stop words dasar dan custom
# stop_words.update(custom_stop_words)

# # Kata-kata penting yang ingin ditampilkan
# important_keywords = {
#     "mantra", "itihasa", "weda", "lelampahan", "agama", "wariga", "babad", "tantri",
#     "pamancangah", "satua", "cerita", "cerita wayang", "sesana/moral", "moral", "daun rontar",
#     "3.5", "50", "karangasem", "gianyar", "buleleng", "singaraja", "tabanan", "negara",
#     "bangli", "denpasar"
# }

# # Kamus sinonim sederhana
# synonyms = {
#     "upakara": "mantra",
#     "sejarah": "babad",
# }

# # Daftar daerah di Bali
# bali_regions = {
#     "karangasem", "gianyar", "buleleng", "singaraja", "tabanan", "jembrana", "bangli", "denpasar", "klungkung", "badung"
# }

# def replace_keyword(word):
#     return synonyms.get(word, word)

# def tokenize_input(keyword):
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
#         print("Error:", str(e))
#         return None

# def is_bali_region(keyword):
#     return keyword.lower() in bali_regions

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

#     # Periksa apakah keyword adalah daerah di Bali
#     if is_bali_region(replaced_keyword):
#         print("Region:", replaced_keyword)
#     else:
#         print("General search within Bali regions")



