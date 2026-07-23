package com.eciels.android.INEC;

import android.util.Log;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class MultipartUtility {

    private static final String TAG = "UPLOAD";
    private static final String LINE_FEED = "\r\n";

    private final String boundary;
    private final String charset;

    private HttpURLConnection httpConn;
    private OutputStream outputStream;
    private PrintWriter writer;

    public MultipartUtility(String requestURL, String charset)
            throws IOException {

        this.charset = charset;

        boundary = "===" + System.currentTimeMillis() + "===";

        URL url = new URL(requestURL);

        httpConn = (HttpURLConnection) url.openConnection();

        httpConn.setUseCaches(false);
        httpConn.setDoInput(true);
        httpConn.setDoOutput(true);

        httpConn.setRequestMethod("POST");

        httpConn.setConnectTimeout(60000);
        httpConn.setReadTimeout(60000);

        httpConn.setRequestProperty(
                "Content-Type",
                "multipart/form-data; boundary=" + boundary);

        httpConn.setRequestProperty(
                "User-Agent",
                "Mozilla/5.0");

        outputStream = httpConn.getOutputStream();

        writer = new PrintWriter(
                new OutputStreamWriter(outputStream, charset),
                true);
    }

    public void addFormField(String name, String value) {

        if (value == null) {
            value = "";
        }

        writer.append("--")
                .append(boundary)
                .append(LINE_FEED);

        writer.append(
                        "Content-Disposition: form-data; name=\""
                                + name + "\"")
                .append(LINE_FEED);

        writer.append(
                        "Content-Type: text/plain; charset="
                                + charset)
                .append(LINE_FEED);

        writer.append(LINE_FEED);
        writer.append(value);
        writer.append(LINE_FEED);

        writer.flush();

        Log.d(TAG, "Field: " + name + "=" + value);
    }

    public void addFilePart(
            String fieldName,
            File uploadFile)
            throws IOException {

        String fileName = uploadFile.getName();

        Log.d(TAG,
                "Uploading File: "
                        + uploadFile.getAbsolutePath());

        Log.d(TAG,
                "File Exists: "
                        + uploadFile.exists());

        Log.d(TAG,
                "File Size: "
                        + uploadFile.length());

        writer.append("--")
                .append(boundary)
                .append(LINE_FEED);

        writer.append(
                        "Content-Disposition: form-data; name=\""
                                + fieldName
                                + "\"; filename=\""
                                + fileName
                                + "\"")
                .append(LINE_FEED);

        // Force MP4 content type
        writer.append("Content-Type: video/mp4")
                .append(LINE_FEED);

        writer.append(
                        "Content-Transfer-Encoding: binary")
                .append(LINE_FEED);

        writer.append(LINE_FEED);

        writer.flush();

        FileInputStream inputStream =
                new FileInputStream(uploadFile);

        byte[] buffer = new byte[8192];

        int bytesRead;

        while ((bytesRead =
                inputStream.read(buffer)) != -1) {

            outputStream.write(
                    buffer,
                    0,
                    bytesRead);
        }

        outputStream.flush();

        inputStream.close();

        writer.append(LINE_FEED);
        writer.flush();

        Log.d(TAG,
                "Finished writing file data.");
    }

    public void addHeaderField(
            String name,
            String value) {

        writer.append(name)
                .append(": ")
                .append(value)
                .append(LINE_FEED);

        writer.flush();
    }

    public List<String> finish()
            throws IOException {

        List<String> response =
                new ArrayList<>();

        writer.append(LINE_FEED);
        writer.flush();

        writer.append("--")
                .append(boundary)
                .append("--")
                .append(LINE_FEED);

        writer.close();

        int status = httpConn.getResponseCode();

        Log.d(TAG,
                "HTTP Status = "
                        + status);

        InputStream stream;

        if (status == HttpURLConnection.HTTP_OK) {

            stream = httpConn.getInputStream();

        } else {

            stream = httpConn.getErrorStream();
        }

        if (stream != null) {

            BufferedReader reader =
                    new BufferedReader(
                            new InputStreamReader(stream));

            String line;

            while ((line = reader.readLine()) != null) {

                response.add(line);

                if (status == HttpURLConnection.HTTP_OK) {

                    Log.d(
                            "SERVER_RESPONSE",
                            line);

                } else {

                    Log.e(
                            "SERVER_RESPONSE",
                            line);
                }
            }

            reader.close();
        }

        httpConn.disconnect();

        if (status != HttpURLConnection.HTTP_OK) {

            throw new IOException(
                    "Server returned status "
                            + status
                            + " response="
                            + response);
        }

        return response;
    }
}