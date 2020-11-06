package mzounko.hackhaton.com.m_zounko;

import android.app.DownloadManager;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.text.SpannableString;
import android.text.style.UnderlineSpan;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.TextView;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.common.api.GoogleApiClient;

import java.io.IOException;

import butterknife.Bind;
import butterknife.ButterKnife;
import mzounko.hackhaton.com.m_zounko.adapter.AnnonceAdapter;
import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

/**
 * Created by fbessan on 06/06/16.
 */
public class ConnexionActivity extends AppCompatActivity {


    @Bind(R.id.toolbar)
    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_connexion);
        ButterKnife.bind(this);
        setSupportActionBar(toolbar);

        TextView textView = (TextView) findViewById(R.id.passforgot);
        SpannableString content = new SpannableString("I forgot my password");
        content.setSpan(new UnderlineSpan(), 0, content.length(), 0);
        textView.setText(content);


        //Se connecter
    }





    public class loadUsers extends AsyncTask<String, Void, String> {

        OkHttpClient client = new OkHttpClient();

        @Override
        protected String doInBackground(String... params) {

            Request.Builder builder = new Request.Builder();
            builder.url(Constant.SERVEUR_URL+Constant.urlUsers);
            Request request = builder.build();

            /*try {
                Response response = client.newCall(request).execute();
                System.out.println("ConnexionActivity" + response.body().string());
                Log.d("ConnexionActivity", response.body().string());
                return response.body().string();
            } catch (Exception e) {
                e.printStackTrace();
            }*/

            // Get a handler that can be used to post to the main thread
            client.newCall(request).enqueue(new Callback() {
                @Override
                public void onFailure(Call call, IOException e) {
                    e.printStackTrace();
                }

                @Override
                public void onResponse(Call call, final Response response) throws IOException {
                    if (!response.isSuccessful()) {
                        throw new IOException("Unexpected code ConnexionActivity " + response);

                    }else{
                        System.out.println("ConnexionActivity" + response.body().string());
                    }
                }
            });
            return null;


        }
    }
}
