package com.mercandalli.jarvis;

import android.app.FragmentManager;
import android.content.res.Configuration;
import android.os.Bundle;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import com.mercandalli.jarvis.fragments.FileManagerFragment;
import com.mercandalli.jarvis.navdrawer.NavDrawerItem;
import com.mercandalli.jarvis.navdrawer.NavDrawerItemListe;
import com.mercandalli.jarvis.navdrawer.NavDrawerListAdapter;

public class ApplicationDrawer extends Application {	
	
	public static final int TYPE_IC 		= 0;
	public static final int TYPE_NORMAL	 	= 1;
	public static final int TYPE_SECTION	= 2;
    
    FileManagerFragment fragment;

	protected DrawerLayout mDrawerLayout;
	protected ListView mDrawerList;
	protected NavDrawerItemListe navDrawerItems;
	protected ActionBarDrawerToggle mDrawerToggle;
	public NavDrawerItem TAB_1, TAB_2, TAB_3;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {		
		super.onCreate(savedInstanceState);     
        
        mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
        mDrawerList = (ListView) findViewById(R.id.left_drawer);        
        
        mDrawerLayout.setDrawerShadow(R.drawable.drawer_shadow, GravityCompat.START);
        navDrawerItems = new NavDrawerItemListe();
        
        TAB_1 = new NavDrawerItem( config.getUserUsername(), R.drawable.ic_launcher, TYPE_IC);        
        TAB_2 = new NavDrawerItem( "Explore", TYPE_NORMAL);
        TAB_3 = new NavDrawerItem( "Request", new IFunction() {
			@Override
			public boolean condition() {return true;}

			@Override
			public void execute() {
				dialog = new DialogRequest(ApplicationDrawer.this);
			}
        	
        }, TYPE_NORMAL);
        
        navDrawerItems.add(TAB_1);
        navDrawerItems.add(TAB_2);
        navDrawerItems.add(TAB_3);
        
    	fragment = new FileManagerFragment();
        FragmentManager fragmentManager = getFragmentManager();
        fragmentManager.beginTransaction().replace(R.id.content_frame, fragment).commit();        
        
        getActionBar().setDisplayHomeAsUpEnabled(true);
        getActionBar().setIcon(R.drawable.transparent);
        
        mDrawerList.setAdapter(new NavDrawerListAdapter(this, navDrawerItems.getListe()));
        mDrawerList.setOnItemClickListener(new DrawerItemClickListener());
        
        mDrawerToggle = new ActionBarDrawerToggle(
                this,               
                mDrawerLayout,      
                R.string.app_name, 
                R.string.app_name  
                ) {
            public void onDrawerClosed(View view) {
            	super.onDrawerClosed(view);
                invalidateOptionsMenu();
            }

            public void onDrawerOpened(View drawerView) {
            	super.onDrawerOpened(drawerView);
                invalidateOptionsMenu();
            }
        };
        
        mDrawerLayout.setDrawerListener(mDrawerToggle);
	}
	
	private void selectItem(int position) {    	
    	for(NavDrawerItem nav : navDrawerItems.getListe())
    		if(navDrawerItems.get(position).equals(nav))
    			if(nav.listenerClick!=null)
    				if(nav.listenerClick.condition())
    					nav.listenerClick.execute();
    	
        mDrawerLayout.closeDrawer(mDrawerList);
    }
    
    private class DrawerItemClickListener implements ListView.OnItemClickListener {
        @Override
        public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
            selectItem(position);
        }
    }	
    
    @Override
    protected void onPostCreate(Bundle savedInstanceState) {
        super.onPostCreate(savedInstanceState);
        mDrawerToggle.syncState();
    }

    @Override
    public void onConfigurationChanged(Configuration newConfig) {
        super.onConfigurationChanged(newConfig);
        mDrawerToggle.onConfigurationChanged(newConfig);
    }
    
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
    	boolean drawerOpen = mDrawerLayout.isDrawerOpen(mDrawerList);
        switch (item.getItemId()) {
        case android.R.id.home:
        	if(drawerOpen) 	mDrawerLayout.closeDrawer(mDrawerList);
        	else 			mDrawerLayout.openDrawer(mDrawerList);
        	return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
