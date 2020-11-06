package mzounko.hackhaton.com.m_zounko;

import android.annotation.TargetApi;
import android.app.SearchManager;
import android.content.Context;
import android.os.Build;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.SearchView;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;

import butterknife.Bind;
import butterknife.ButterKnife;
import mzounko.hackhaton.com.m_zounko.R;

/**
 * Created by fbessan on 09/06/16.
 */
public class MenuActivity extends AppCompatActivity{

    @Bind(R.id.toolbar)
    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_home);

        ButterKnife.bind(this);
        setSupportActionBar(toolbar);


    }


}
