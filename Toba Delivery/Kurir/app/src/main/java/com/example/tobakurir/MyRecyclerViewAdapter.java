package com.example.tobakurir;

import android.content.Context;
import android.text.Html;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

import java.util.ArrayList;
import java.util.List;

public class MyRecyclerViewAdapter extends RecyclerView.Adapter<MyRecyclerViewAdapter.CustomViewHolder> {
    private List<FeedItem> feedItemList;
    private Context mContext;
    //private OnItemClickListener onItemClickListener;
    View view;
    public MyRecyclerViewAdapter(Context context, List<FeedItem> feedItemList) {
        this.feedItemList = feedItemList;
        this.mContext = context;
        //this.feedItemList = new ArrayList<FeedItem>();
        // we copy the original list to the filter list and use it for setting row values
        //this.feedItemList.addAll(this.feedItemList);
    }
    @Override
    public CustomViewHolder onCreateViewHolder(ViewGroup viewGroup, int i) {
        view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.list_row, null);
        CustomViewHolder viewHolder = new CustomViewHolder(view);
        return viewHolder;
    }
    @Override
    public void onBindViewHolder(CustomViewHolder customViewHolder, int i) {
        final FeedItem feedItem = feedItemList.get(i);
        //Download image using picasso library
        if (!TextUtils.isEmpty(feedItem.getThumbnail())) {
            Glide.with(mContext)
                    .load(feedItem.getThumbnail())
                    .into(customViewHolder.imageView);
        }

        //Setting text view title
        customViewHolder.textViewId.setText("Id Produk:"+String.valueOf(feedItem.getId_produk()));
        customViewHolder.textView.setText(Html.fromHtml(feedItem.getTitle()));
        customViewHolder.textView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(view.getContext(), feedItem.getTitle(), Toast.LENGTH_SHORT).show();            }
        });
        customViewHolder.textViewToko.setText(String.valueOf(feedItem.getNama_toko()));
        customViewHolder.textViewAlamat.setText(String.valueOf(feedItem.getAlamat()));
        customViewHolder.textViewPrice.setText("Rp."+String.valueOf(feedItem.getHarga())+"0");
      /*  final View.OnClickListener listener = new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //onItemClickListener.onItemClick(feedItem);
                Toast.makeText(view.getContext(),feedItem.getTitle(), Toast.LENGTH_SHORT).show();
            }
        };*/
        /*customViewHolder.imageView.setOnClickListener(listener);
        customViewHolder.textView.setOnClickListener(listener);*/
    }
    class CustomViewHolder extends RecyclerView.ViewHolder {
        protected ImageView imageView;
        protected TextView textView;
        TextView  textViewAlamat, textViewToko, textViewPrice, textViewId;

        public CustomViewHolder(View view) {
            super(view);
            this.imageView = (ImageView) view.findViewById(R.id.thumbnail);
            this.textView = (TextView) view.findViewById(R.id.title);
            this.textViewPrice = (TextView) view.findViewById(R.id.textViewPrice);
            this.textViewId = (TextView) view.findViewById(R.id.textViewID);
            this.textViewAlamat = (TextView) view.findViewById(R.id.textViewAlamat);
            this.textViewToko = (TextView) view.findViewById(R.id.textViewToko);
        }
    }


    @Override
    public int getItemCount() {
        return feedItemList.size();
    }

    public void setFilter(List<FeedItem> countryModels) {
        feedItemList = new ArrayList<>();
        feedItemList.addAll(countryModels);
        notifyDataSetChanged();
    }
}