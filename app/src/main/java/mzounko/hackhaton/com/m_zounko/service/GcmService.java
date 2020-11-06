
package mzounko.hackhaton.com.m_zounko.service;

import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.TaskStackBuilder;
import android.util.Log;

import com.google.android.gms.gcm.GcmListenerService;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;


import java.lang.reflect.Type;

import mzounko.hackhaton.com.m_zounko.MainActivity;
import mzounko.hackhaton.com.m_zounko.R;
import mzounko.hackhaton.com.m_zounko.model.Message;


/**
 * Service used for receiving GCM messages. When a message is received this service will log it.
 */
public class GcmService extends GcmListenerService {


    public GcmService() {

    }

    @Override
    public void onMessageReceived(String from, Bundle data) {

        String message = data.getString("response");
        Gson gson = new Gson();
        Type t = new TypeToken<Message>() {
        }.getType();
        Log.e("Message", message);
       Message push =  gson.fromJson(message, t);

        sendNotification(push.toString());
    }

    @Override
    public void onDeletedMessages() {

        //sendNotification("Deleted messages on server");
    }

    @Override
    public void onMessageSent(String msgId) {
        //sendNotification("Upstream message sent. Id=" + msgId);
    }

    @Override
    public void onSendError(String msgId, String error) {
       // sendNotification("Upstream message send error. Id=" + msgId + ", error" + error);
    }

    // Put the message into a notification and post it.
    // This is just one simple example of what you might choose to do with
    // a GCM message.
    private void sendNotification(String msg) {

        //logger.log(Log.INFO, msg);
        NotificationCompat.Builder mBuilder =
                new NotificationCompat.Builder(this)
                        .setSmallIcon(R.mipmap.logo_mobile)
                        .setContentTitle("MZOUNKO")
                        .setContentText(msg);

        Intent resultIntent = new Intent(this, MainActivity.class);
        TaskStackBuilder stackBuilder = TaskStackBuilder.create(this);

        stackBuilder.addParentStack(MainActivity.class);
        stackBuilder.addNextIntent(resultIntent);
        PendingIntent resultPendingIntent =
                stackBuilder.getPendingIntent(
                        0,
                        PendingIntent.FLAG_UPDATE_CURRENT
                );
        mBuilder.setContentIntent(resultPendingIntent);
        NotificationManager mNotificationManager =
                (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);
        mNotificationManager.notify(1, mBuilder.build());
    }
}
