package it.volta.ts.grassofederico.spaceinvaders.ui;

import javax.swing.ImageIcon;
import javax.swing.JLabel;

public class Immagine extends JLabel{
		
	public Immagine(String percorso,int x,int y,int height,int width) {
		setIcon(new ImageIcon(percorso));
		setBounds(x,y,height,width);
	}
}
