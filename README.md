# InvoMark-A-Tool-For-Hidden-Watermarking-in-Digital-Image
The process of embedding a hidden watermark in an image is widely used for various purposes such as copyright protection, authentication, and security. In this project, we propose a technique for implementing hidden watermarking on an image using Python. 
The proposedtechnique involves converting the image into an array of pixels, generating a watermark,
applying a transform to the watermark, embedding the watermark into the original image by
modifying the pixel values, and saving the watermarked image to a file. 
The implementation of
the proposed technique is done using various image processing libraries in Python such as NumPy, OpenCV, and Pillow. The discrete cosine transform (DCT) is used as a transform for
the watermark, and the embedding process is done by modifying the least significant bit (LSB) of the pixel values. The extraction of the watermark is done by applying the DCT transform to the watermarked image and comparing it with the original watermark to determine if the image
has been tampered with. The performance of the proposed technique is evaluated on various test images, and the results show that the embedded watermark is not easily visible and can only be detected using specific techniques. The proposed technique provides a simple and efficient
way of implementing hidden watermarking on an image using Python and can be used for various applications such as copyright protection, authentication, and security.
