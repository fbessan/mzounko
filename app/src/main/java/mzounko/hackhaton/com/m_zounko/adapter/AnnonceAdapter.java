package mzounko.hackhaton.com.m_zounko.adapter;

import android.content.Context;
import android.graphics.Paint;
import android.graphics.drawable.ShapeDrawable;
import android.graphics.drawable.shapes.OvalShape;
import android.graphics.drawable.shapes.RectShape;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.HorizontalScrollView;
import android.widget.LinearLayout;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.List;

import mzounko.hackhaton.com.m_zounko.R;
import mzounko.hackhaton.com.m_zounko.model.Announce;
import mzounko.hackhaton.com.m_zounko.model.RestAnnonce;

/**
 * Created by Florentio on 12/09/15.
 */
public class AnnonceAdapter extends BaseAdapter {

    private List<RestAnnonce.RestAnnonceDetail> announces;
    private Context mContext;
    String categorie[];

    public AnnonceAdapter(List<RestAnnonce.RestAnnonceDetail> annonces, Context context)
    {
        this.announces = annonces;
        this.mContext = context;
        categorie = mContext.getResources().getStringArray(R.array.categories);
    }

    @Override
    public int getCount() {
        return announces.size();
    }

    @Override
    public Object getItem(int i) {
        return announces.get(i);
    }

    @Override
    public long getItemId(int i) {
        return 0;
    }

    @Override
    public View getView(int i, View view, ViewGroup parent) {
        LayoutInflater inflater = LayoutInflater.from(mContext);

         View v =  inflater.inflate(R.layout.annonce_list_item, parent, false);
        TextView  label = (TextView) v.findViewById(R.id.libelle);
        TextView  price = (TextView) v.findViewById(R.id.prix);
        TextView  qte = (TextView) v.findViewById(R.id.qte);
        TextView  cate = (TextView) v.findViewById(R.id.categorie);
        TextView  statut = (TextView) v.findViewById(R.id.statut);
        TextView  type = (TextView) v.findViewById(R.id.type);
        TextView  response = (TextView) v.findViewById(R.id.reponse);



        RestAnnonce.RestAnnonceDetail an = announces.get(i);


        label.setText(an.getDescription());


        price.setText(an.getPrix_unitaire() + "FCFA/unité");
        qte.setText(an.getQuantite()+"");
        cate.setText(an.getCategorie());

        //Type d'annonce drawable
        //ShapeDrawable typeDrawable = new ShapeDrawable(new OvalShape());
        //typeDrawable.setIntrinsicWidth(18);
        //typeDrawable.setIntrinsicHeight(18);
       // typeDrawable.getPaint().setStyle(Paint.Style.FILL);
       // type.setCompoundDrawablesWithIntrinsicBounds(null, null, typeDrawable, null);
        String phase= an.getPhase_id();
        if(phase.equals("1")) {
          //  typeDrawable.getPaint().setColor(mContext.getResources().getColor(R.color.over));
            statut.setText("Nouveau");
            statut.setTextColor(mContext.getResources().getColor(R.color.nouv));
        }
        else {
            //typeDrawable.getPaint().setColor(mContext.getResources().getColor(R.color.pending));
            statut.setText("En cours");
            statut.setTextColor(mContext.getResources().getColor(R.color.pending));
        }

        if(Integer.parseInt(an.getNbr_reponse())==0)
            response.setVisibility(View.GONE);
       else
        {
            response.setVisibility(View.VISIBLE);
            response.setText(an.getNbr_reponse().equals("1") ? an.getNbr_reponse() + " réponse"
                    : an.getNbr_reponse() + " réponses" );
        }






      //  ShapeDrawable statutDrawable = new ShapeDrawable(new OvalShape());
      //  statutDrawable.setIntrinsicWidth(18);
       // statutDrawable.setIntrinsicHeight(18);
       // statutDrawable.getPaint().setStyle(Paint.Style.FILL);
       // statut.setCompoundDrawablesWithIntrinsicBounds(null, null, statutDrawable, null);



        if(an.getType_id().equals("1")) {
            type.setText("Achat");
         //   statutDrawable.getPaint().setColor(mContext.getResources().getColor(R.color.achat));

        }
        else
            type.setText("Vente");
         //   statutDrawable.getPaint().setColor(mContext.getResources().getColor(R.color.vente));




        return v;
    }
}
