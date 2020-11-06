package mzounko.hackhaton.com.m_zounko.ui;

import android.annotation.TargetApi;
import android.app.Activity;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Spinner;

import butterknife.Bind;
import butterknife.ButterKnife;
import mzounko.hackhaton.com.m_zounko.Constant;
import mzounko.hackhaton.com.m_zounko.MainActivity;
import mzounko.hackhaton.com.m_zounko.Manifest;
import mzounko.hackhaton.com.m_zounko.R;
import mzounko.hackhaton.com.m_zounko.RequestUtils;
import mzounko.hackhaton.com.m_zounko.function.Functions;

public class PostActivity extends AppCompatActivity {

    @Bind(R.id.description)
    EditText description;
    @Bind(R.id.libelle)
    EditText libele;
    @Bind(R.id.qte)
    EditText qte;
    @Bind(R.id.price)
    EditText prix;
    @Bind(R.id.check)
    CheckBox image;
    @Bind(R.id.categorie)
    Spinner sp;
    @Bind(R.id.type)
    Spinner spT;


    final private int REQUEST_CODE_ASK_PERMISSIONS = 123;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_post);
        ButterKnife.bind(this);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.categories, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        sp.setAdapter(adapter);


        ArrayAdapter<CharSequence> adapter1 = ArrayAdapter.createFromResource(this,
                R.array.type, android.R.layout.simple_spinner_item);
        adapter1.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spT.setAdapter(adapter1);


		if(getSupportActionBar()!=null){
			getSupportActionBar().setDisplayHomeAsUpEnabled(true);
		}


    }	


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if(item.getItemId()==R.id.send)
            sendAnnounce();

        return true;
    }

    private void sendAnnounce() {

        Functions functions = new Functions();

        String device_id = null;

        String qteV= qte.getText().toString();
        String libelleV= libele.getText().toString();
        libelleV=libelleV.replace(" ","%20");
        String descV= description.getText().toString();
        descV=descV.replace(" ","%20");
        String prixV= prix.getText().toString();
        int cat = sp.getSelectedItemPosition()+1;
        int type = spT.getSelectedItemPosition()+1;

        if(AllowPrivileges() && getApplicationContext()!=null){
            device_id = functions.getIMEI(getApplicationContext());
        }
        
        /*final String url = RequestUtils.SERVEUR_URL+ Constant.urlAddAnnonce+"?type_annonce_id="+type+"&categorie_id=" +
                ""+cat+"&user_id=1&description="+descV+"&prix_unitaire="+prixV+"&quantite="+qteV
               +"&libelle="+libelleV+"&imei="+device_id;*/

        final String urlAjoutAnnonce = Constant.SERVEUR_URL+ Constant.urlAddAnnonce+"?json={\"type_annonce_id\": \""+type+"\",\"categorie_id\":\""+cat+"\",\"user_id\":\""+type+"\",\"description\":\""+descV+"\",\"prix_unitaire\":\""+prixV+"\",\"quantite\":\""+qteV+"\",\"libelle\":\""+libelleV+"\",\"imei\":\""+device_id+"\"}";




        new AsyncTask<Void, Void, String>()
        {

            @Override
            protected String doInBackground(Void... voids) {

                return RequestUtils.getServeurResponse(urlAjoutAnnonce);
                //return RequestUtils.getServeurResponse(urlAjoutAnnonce, "POST", 10000);
                //return RequestUtils.getJSON(urlAjoutAnnonce, "POST", 10000);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                if(s!=null && s.contains("200")) {
                    setResult(Activity.RESULT_OK);
                    finish();
                }
                else {
                    try {
                        Snackbar.make(libele, "Problème de connexion. Réessayer plutard " , Snackbar.LENGTH_LONG).setAction("Action", null).show();
                    } catch (Exception ignored) {

                    }
                }
            }
        }.execute();
    }


    @TargetApi(Build.VERSION_CODES.M)
    private boolean AllowPrivileges()
    {
        if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.M) {

            int hasReadPhoneStatePermission = checkSelfPermission(android.Manifest.permission.READ_PHONE_STATE);

            if (hasReadPhoneStatePermission != PackageManager.PERMISSION_GRANTED) {
                requestPermissions(new String[]{android.Manifest.permission.READ_PHONE_STATE},REQUEST_CODE_ASK_PERMISSIONS);
                return false;
            }
        }


        return true;
    }
}
