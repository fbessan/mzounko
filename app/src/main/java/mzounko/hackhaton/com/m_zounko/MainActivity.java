package mzounko.hackhaton.com.m_zounko;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.ArrayList;

import butterknife.Bind;
import butterknife.ButterKnife;
import mzounko.hackhaton.com.m_zounko.adapter.AnnonceAdapter;
import mzounko.hackhaton.com.m_zounko.model.RestAnnonce;
import mzounko.hackhaton.com.m_zounko.ui.PostActivity;

public class MainActivity extends AppCompatActivity {


    @Bind(R.id.fab)
    FloatingActionButton fab;
    @Bind(R.id.toolbar)
    Toolbar toolbar;
    @Bind(R.id.spinner)
    Spinner categories;
    @Bind(R.id.list_annonce)
    ListView annonceList;

    AnnonceAdapter annonceAdapter;
    SharedPreferences prefs;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ButterKnife.bind(this);

        setSupportActionBar(toolbar);

        prefs = PreferenceManager.getDefaultSharedPreferences(this);


        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(MainActivity.this, PostActivity.class);
                startActivityForResult(i, 10);
                // Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                //       .setAction("Action", null).show();
            }
        });
        annonceList = (ListView) findViewById(R.id.list_annonce);
        if(getSupportActionBar()!=null) {
            getSupportActionBar().setDisplayShowTitleEnabled(true);
        }

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(toolbar.getContext(),
                R.array.categories, R.layout.support_simple_spinner_dropdown_item);
        adapter.setDropDownViewResource(R.layout.support_simple_spinner_dropdown_item);
        categories.setAdapter(adapter);

        categories.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {

            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        if (prefs.getString(Constant.GCM_ID, "").equals("")) {
            InstanceIdHelper instanceIdHelper = new InstanceIdHelper(this);
            instanceIdHelper.getGcmTokenInBackground(Constant.SENDER_ID);
        }

        //  annonceList.setAdapter(annonceAdapter);
        loadAnnounce();

    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == 10) {
            if (resultCode == Activity.RESULT_OK) {
                Snackbar.make(fab, "Nouvelle offre ajoutée avec succès. Rechargement en cours", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();

                loadAnnounce();
            }

        }
    }


    private void loadAnnounce() {
        new AsyncTask<Void, Void, ArrayList<RestAnnonce>>() {

            @Override
            protected ArrayList<RestAnnonce> doInBackground(Void... voids) {
                String json = RequestUtils.getJSON(Constant.SERVEUR_URL + "announces", "GET", 10000);


                Log.i("Reponse","Je suis une reponse " + json);
                try {
                    Gson gson = new Gson();
                    Type t = new TypeToken<ArrayList<RestAnnonce>>() {
                    }.getType();
                    return gson.fromJson(json, t);
                } catch (Exception e) {
                    return null;
                }
            }

            @Override
            protected void onPostExecute(ArrayList<RestAnnonce> restAnnonces) {
                super.onPostExecute(restAnnonces);
                if (restAnnonces != null) {
                    annonceAdapter = new AnnonceAdapter(restAnnonces, MainActivity.this);
                    annonceList.setAdapter(annonceAdapter);
                }
            }
        }.execute();
    }
}
