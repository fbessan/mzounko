 
package mzounko.hackhaton.com.m_zounko;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.preference.PreferenceManager;
import android.util.Log;

import com.google.android.gms.gcm.GoogleCloudMessaging;
import com.google.android.gms.iid.InstanceID;

import java.io.IOException;

/**

 */
public class InstanceIdHelper {

    private final Context mContext;
    private SharedPreferences prefs;
    private SharedPreferences.Editor editor;


    public InstanceIdHelper(Context context) {
        mContext = context;
        prefs = PreferenceManager.getDefaultSharedPreferences(mContext);

    }

    /**
     * Register for GCM
     *
     * @param senderId the project id used by the app's server
     */
    public void getGcmTokenInBackground(final String senderId) {
        if (prefs.getString(Constant.GCM_ID, "").equals(""))
            new AsyncTask<Void, Void, Void>() {
                @Override
                protected Void doInBackground(Void... params) {
                    try {
                        String token =
                                InstanceID.getInstance(mContext).getToken(senderId,
                                        GoogleCloudMessaging.INSTANCE_ID_SCOPE, null);
                        Log.e("registration succeeded.",
                                "\nsenderId: " + senderId + "\ntoken: " + token);
                        // Save the token in the address book

                         sendGCM(token);

                        //Send Gcm id to server through backgroung process

                    } catch (final IOException e) {
                        Log.e("registration failed.",
                                "\nsenderId: " + senderId + "\nerror: " + e.getMessage());
                    }
                    return null;
                }
            }.execute();
    }

    public void sendGCM(final String gcmid)
    {
        new AsyncTask<Void,Void, String>()
        {

            @Override
            protected String doInBackground(Void... params) {

                return RequestUtils.getJSON(
                        Constant.SERVEUR_URL+"push?user_id=1&gcmid="+gcmid, "GET", 100000);
            }

            @Override
            protected void onPostExecute(String result) {
                super.onPostExecute(result);
             //   Log.e("Reponse", result + "");
                if(result!=null && result.equals("200"))
                {
                    editor = prefs.edit();
                    editor.putString(Constant.GCM_ID, gcmid);
                    editor.apply();
                }
            }
        }.execute();
    }

    /**
     * Unregister by deleting the token
     *
     * @param senderId the project id used by the app's server
     */
    public void deleteGcmTokeInBackground(final String senderId) {
        new AsyncTask<Void, Void, Void>() {
            @Override
            protected Void doInBackground(Void... params) {
                try {
                    InstanceID.getInstance(mContext).deleteToken(senderId,
                            GoogleCloudMessaging.INSTANCE_ID_SCOPE);
                    Log.e("delete token succeeded.",
                            "\nsenderId: " + senderId);
                    editor = prefs.edit();
                    editor.putString(Constant.GCM_ID, "");
                    editor.commit();
                } catch (final IOException e) {

                }
                return null;
            }
        }.execute();
    }
}
