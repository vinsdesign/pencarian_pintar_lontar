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



# berdasarkan kata penting
import nltk
import sys
from nltk.stem import PorterStemmer
from nltk.corpus import stopwords

# Kata-kata penting yang ingin ditampilkan
important_keywords = {
  "mantra", "itihasa", "3.5","50","weda","karangasem","gianyar","buleleng","singaraja","tabanan","negara","bangli", "denpasar",
  }  # Anda dapat menambahkan kata-kata penting lainnya di sini 

def tokenize_input(keyword):
    try:
        # Konversi keyword ke lowercase
        lower_keyword = keyword.lower()

        # Tokenisasi keyword menjadi kata-kata individual
        tokens = nltk.word_tokenize(lower_keyword)

        # Pilih stemmer atau lemmatizer berdasarkan kebutuhan
        stemmer = PorterStemmer()

        # Load stop words bahasa Indonesia
        stop_words = set(stopwords.words('indonesian'))

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
        print("Usage: python nlp_processing.py <keyword>")
        sys.exit(1)

    # Baca keyword dari argumen pertama script
    keyword = sys.argv[1]

    # Jalankan fungsi tokenize_input
    processed_keyword = tokenize_input(keyword)

    # Cetak hasil pemrosesan
    if processed_keyword is not None:
        print(processed_keyword)

