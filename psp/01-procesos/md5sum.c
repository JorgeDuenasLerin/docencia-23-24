#include <stdio.h>
#include <string.h>
#include <openssl/evp.h>

#define MD5_LEN 16

void generateMD5(const char *string, unsigned char *str_result) {
    EVP_MD_CTX *ctx;
    const EVP_MD *md;
    unsigned char result[EVP_MAX_MD_SIZE];

    ctx = EVP_MD_CTX_new();
    md = EVP_md5();

    EVP_DigestInit_ex(ctx, md, NULL);
    EVP_DigestUpdate(ctx, string, strlen(string));
    EVP_DigestFinal_ex(ctx, result, NULL);

    EVP_MD_CTX_free(ctx);

    for(int i = 0; i < MD5_LEN; i++){   // MD5 result is always 16 bytes
        sprintf(str_result+(i*2),"%02x", result[i]);
    }
}

int main(int arc, char *argv[]) {
    char *string = argv[1];

    unsigned char result[EVP_MAX_MD_SIZE];
    unsigned int result_len;

    generateMD5(string, result);

    printf("MD5(\"%s\") = %s", string, result);
   
    printf("\n");

    return 0;
}