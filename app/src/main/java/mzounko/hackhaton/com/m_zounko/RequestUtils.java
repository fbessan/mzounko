package mzounko.hackhaton.com.m_zounko;

import android.annotation.TargetApi;
import android.os.Build;
import android.util.Log;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.FormBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

/**
 * Created by Florentio on 12/09/15.
 */
public class RequestUtils {


    public static String getServeurResponse(String Murl){

        OkHttpClient client = new OkHttpClient();
        RequestBody formBody = new FormBody.Builder()
                //.add("message", "Your message")
                .build();
        Request request = new Request.Builder()
                .url(Murl)
                .post(formBody)
                .build();

        try {
            Response response = client.newCall(request).execute();
            return response.toString();
            // Do something with the response.
        } catch (IOException e) {
            e.printStackTrace();
        }
        return "500";
    }


    public static String getJSON(String url, String method, int timeout) {
        HttpURLConnection c = null;
        //Log.e("URL", url);
        try {


            URL u = new URL(url);
            c = (HttpURLConnection) u.openConnection();
            c.setRequestMethod(method);
            c.setRequestProperty("Content-length", "0");
            c.setUseCaches(false);
            c.setAllowUserInteraction(false);
            c.setConnectTimeout(timeout);
            c.setReadTimeout(timeout);
            c.connect();
            int status = c.getResponseCode();

            System.out.println("RequestUtils getResponseCode " + c.getResponseCode());

            if(status == 200){

                //System.out.println("RequestUtils Response 200" + status);
                BufferedReader br = new BufferedReader(new InputStreamReader(c.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line;
                while ((line = br.readLine()) != null) {
                    sb.append(line).append("\n");
                    System.out.print("RequestUtils III " + sb.append(line).append("\n"));
                }
                br.close();

                System.out.println("RequestUtils toString " + sb.toString());

                return sb.toString();

            }

            /*switch (status) {
                case 500:
                    System.out.println("RequestUtils Response 200" + status);
                case 200:
                    System.out.println("RequestUtils Response 500" + status);
                    BufferedReader br = new BufferedReader(new InputStreamReader(c.getInputStream()));
                    StringBuilder sb = new StringBuilder();
                    String line;
                    while ((line = br.readLine()) != null) {
                        sb.append(line).append("\n");
                    }
                    br.close();
                    return sb.toString();
            }*/
            //poosfkhdsjhfjkdsfdshf






            //ooooooooooooookkkkkk

        } catch (IOException ignored)
        {

        } finally
        {
            if (c != null) {
                try {
                    c.disconnect();
                } catch (Exception ignored) {
                  }
            }
        }
        return null;
    }
}
