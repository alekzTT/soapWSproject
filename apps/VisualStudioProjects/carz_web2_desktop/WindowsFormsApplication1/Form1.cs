using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        localhost.carws carz = new localhost.carws();
        localhost.Car Car1 = new localhost.Car();
        private void button1_Click(object sender, EventArgs e)
        {
            localhost.reply aa = new localhost.reply();
            try
            {
                aa = carz.car(Car1);
                //============================================================
                //MessageBox.Show(aa.reply0, "All Cars From Service");
                listView1.Items.Clear();
                if (aa.reply0 == "")
                {
                    //MessageBox.Sow("No Cars Found", "All Cars From Service");

                    this.textBox1.Text = "No Cars Found";
                }
                else
                {
                    string[] cars = aa.reply0.Split(new string[] { "AND" }, StringSplitOptions.None);
                    int car_num = cars.Length;

                    //MessageBox.Show(car_num.ToString(), "Cars Found");
                    this.textBox1.Text = car_num.ToString();
                    int i = 0;
                    for (i = 0; i < car_num; i++)
                    {
                        string[] car_data = cars[i].Split(new string[] { "_" }, StringSplitOptions.None);
                        ListViewItem Carlist = new ListViewItem();
                        if (car_data != null)
                        {
                            Carlist.Text = car_data[0];
                            Carlist.SubItems.Add(car_data[1]);
                            Carlist.SubItems.Add(car_data[2]);
                            Carlist.SubItems.Add(car_data[3]);
                            Carlist.SubItems.Add(car_data[4]);
                            Carlist.SubItems.Add(car_data[5]);
                            Carlist.SubItems.Add(car_data[6]);
                            Carlist.SubItems.Add(car_data[7]);
                            Carlist.SubItems.Add(car_data[8]);
                            Carlist.SubItems.Add(car_data[10]);
                            Carlist.SubItems.Add(car_data[9]);

                            listView1.Items.Add(Carlist);
                        }
                    }
                }
            }
            catch
            {
                MessageBox.Show("Failed To Load Car Classifields From www.alekz.eu/carz \n Check You Internet Connection", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        public class CustomComboBoxItem
        {
            // Contains the visible "Name" of the item.
            private string _contents;
            public string contents { get { return _contents; } set { _contents = value; } }

            // Contains the hidden "Value" of the item.
            private object _tag;
            public object tag { get { return _tag; } set { _tag = value; } }

            public CustomComboBoxItem(string contents, object tag)
            {
                this._contents = contents;
                this._tag =tag;
            }

            // Only the Name will be displayed when the string value is used
            public override string ToString() { return _contents; }
          

        }
        
        private void Form1_Load(object sender, EventArgs e)
        {
            this.comboBox1.Items.Add(new CustomComboBoxItem("Acura", 1111));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Alfa Romeo", 1112));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Alpina", 1113));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Ariel", 1114));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Asia Motors", 1115));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Aston Martin", 1116));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Audi", 1117));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Autobianchi", 1118));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Bentley", 1119));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Bmw", 1120));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Brilliance", 1121));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Bugatti", 1122));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Buick", 1123));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Cadillac", 1124));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Caterham", 1125));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Chery", 1126));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Chevrolet", 1127));
            this.comboBox1.Items.Add(new CustomComboBoxItem("China-Motors", 1128));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Chrysler", 1129));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Citroen", 1130));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Cobra", 1131));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Corvette", 1132));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Dacia", 1133));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Daewoo", 1134));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Daihatsu", 1135));
            this.comboBox1.Items.Add(new CustomComboBoxItem("DeTomaso", 1136));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Dodge", 1137));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Ferrari", 1138));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Fiat", 1139));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Ford", 1140));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Gmc", 1141));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Honda", 1142));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Hummer", 1143));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Hyundai", 1144));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Infiniti", 1145));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Innocenti", 1146));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Isuzu", 1147));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Jaguar", 1148));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Jeep", 1149));
            this.comboBox1.Items.Add(new CustomComboBoxItem("KTM", 1150));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Kia", 1151));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lada", 1152));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lamborghini", 1153));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lancia", 1154));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Land Rover", 1155));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lexus", 1156));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lincoln", 1157));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Lotus", 1158));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Maserati", 1159));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Mazda", 1160));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Mercedes-Benz", 1161));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Mg", 1162));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Mini", 1163));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Mitsubishi", 1164));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Morgan", 1165));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Nissan", 1166));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Nsu", 1167));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Opel", 1168));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Peugeot", 1169));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Plymouth", 1170));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Pontiac", 1171));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Porsche", 1172));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Proton", 1173));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Renault", 1174));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Rolls Royce", 1175));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Rover", 1176));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Saab", 1177));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Seat", 1178));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Skoda", 1179));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Smart", 1180));
            this.comboBox1.Items.Add(new CustomComboBoxItem("SsangYong", 1181));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Subaru", 1182));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Suzuki", 1183));
            this.comboBox1.Items.Add(new CustomComboBoxItem("TVR", 1184));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Talbot", 1185));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Toyota", 1186));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Trabant", 1187));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Triumph", 1188));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Uaz", 1189));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Ueec", 1190));
            this.comboBox1.Items.Add(new CustomComboBoxItem("VW", 1191));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Vauxhall", 1192));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Volvo", 1193));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Wartburg", 1194));
            this.comboBox1.Items.Add(new CustomComboBoxItem("Wiesmann", 1195));

            //====Prices min (3) + max (4)  ===============================

            this.comboBox3.Items.Add(new CustomComboBoxItem("0",500));
            this.comboBox3.Items.Add(new CustomComboBoxItem("1000", 1000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("1500", 1500));
            this.comboBox3.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("3000", 3000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("4000", 4000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("5000", 5000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("6000", 6000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("7000", 7000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("8000", 8000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("9000", 9000));
            this.comboBox3.Items.Add(new CustomComboBoxItem("10000", 10000));
           //=================================================================
            this.comboBox4.Items.Add(new CustomComboBoxItem("1000", 1000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("3000", 3000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("4000", 4000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("5000", 5000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("6000", 6000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("7000", 7000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("8000", 8000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("9000", 9000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("10000", 10000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("15000", 15000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("20000", 20000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("30000", 30000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("40000", 40000));
            this.comboBox4.Items.Add(new CustomComboBoxItem("50000", 50000));
          //==========================================================================

            //Engine Size min (5) & max (6)===========================================
            this.comboBox5.Items.Add(new CustomComboBoxItem("300", 300));
            this.comboBox5.Items.Add(new CustomComboBoxItem("400", 400));
            this.comboBox5.Items.Add(new CustomComboBoxItem("500", 500));
            this.comboBox5.Items.Add(new CustomComboBoxItem("600", 600));
            this.comboBox5.Items.Add(new CustomComboBoxItem("700", 700));
            this.comboBox5.Items.Add(new CustomComboBoxItem("800", 800));
            this.comboBox5.Items.Add(new CustomComboBoxItem("900", 900));
            this.comboBox5.Items.Add(new CustomComboBoxItem("1000", 1000));
            this.comboBox5.Items.Add(new CustomComboBoxItem("1100", 1100));
            this.comboBox5.Items.Add(new CustomComboBoxItem("1400", 1400));
            this.comboBox5.Items.Add(new CustomComboBoxItem("1600", 1600));
            this.comboBox5.Items.Add(new CustomComboBoxItem("1800", 1800));
            this.comboBox5.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox5.Items.Add(new CustomComboBoxItem("2500", 2500));
            this.comboBox5.Items.Add(new CustomComboBoxItem("3000", 3000));
            this.comboBox5.Items.Add(new CustomComboBoxItem("4000", 4000));
            this.comboBox5.Items.Add(new CustomComboBoxItem("5000", 5000));
            //====================================================================
            this.comboBox6.Items.Add(new CustomComboBoxItem("300", 300));
            this.comboBox6.Items.Add(new CustomComboBoxItem("400", 400));
            this.comboBox6.Items.Add(new CustomComboBoxItem("500", 500));
            this.comboBox6.Items.Add(new CustomComboBoxItem("600", 600));
            this.comboBox6.Items.Add(new CustomComboBoxItem("700", 700));
            this.comboBox6.Items.Add(new CustomComboBoxItem("800", 800));
            this.comboBox6.Items.Add(new CustomComboBoxItem("900", 900));
            this.comboBox6.Items.Add(new CustomComboBoxItem("1000", 1000));
            this.comboBox6.Items.Add(new CustomComboBoxItem("1100", 1100));
            this.comboBox6.Items.Add(new CustomComboBoxItem("1400", 1400));
            this.comboBox6.Items.Add(new CustomComboBoxItem("1600", 1600));
            this.comboBox6.Items.Add(new CustomComboBoxItem("1800", 1800));
            this.comboBox6.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox6.Items.Add(new CustomComboBoxItem("2500", 2500));
            this.comboBox6.Items.Add(new CustomComboBoxItem("3000", 3000));
            this.comboBox6.Items.Add(new CustomComboBoxItem("4000", 4000));
            this.comboBox6.Items.Add(new CustomComboBoxItem("5000", 5000));
            //=======================================================================
            //=====7 _ 8 Min and Max Engine power
            this.comboBox7.Items.Add(new CustomComboBoxItem("35", 35));
            this.comboBox7.Items.Add(new CustomComboBoxItem("50", 50));
            this.comboBox7.Items.Add(new CustomComboBoxItem("60", 60));
            this.comboBox7.Items.Add(new CustomComboBoxItem("75", 75));
            this.comboBox7.Items.Add(new CustomComboBoxItem("90", 90));
            this.comboBox7.Items.Add(new CustomComboBoxItem("100", 100));
            this.comboBox7.Items.Add(new CustomComboBoxItem("120", 120));
            this.comboBox7.Items.Add(new CustomComboBoxItem("130", 130));
            this.comboBox7.Items.Add(new CustomComboBoxItem("140", 140));
            this.comboBox7.Items.Add(new CustomComboBoxItem("160", 160));
            this.comboBox7.Items.Add(new CustomComboBoxItem("170", 170));
            this.comboBox7.Items.Add(new CustomComboBoxItem("180", 180));
            this.comboBox7.Items.Add(new CustomComboBoxItem("190", 190));
            this.comboBox7.Items.Add(new CustomComboBoxItem("200", 200));
            this.comboBox7.Items.Add(new CustomComboBoxItem("250", 250));
            this.comboBox7.Items.Add(new CustomComboBoxItem("300", 300));
            this.comboBox7.Items.Add(new CustomComboBoxItem("350", 350));
            this.comboBox7.Items.Add(new CustomComboBoxItem("400", 400));
            this.comboBox7.Items.Add(new CustomComboBoxItem("450", 450));

            this.comboBox8.Items.Add(new CustomComboBoxItem("35", 35));
            this.comboBox8.Items.Add(new CustomComboBoxItem("50", 50));
            this.comboBox8.Items.Add(new CustomComboBoxItem("60", 60));
            this.comboBox8.Items.Add(new CustomComboBoxItem("75", 75));
            this.comboBox8.Items.Add(new CustomComboBoxItem("90", 90));
            this.comboBox8.Items.Add(new CustomComboBoxItem("100", 100));
            this.comboBox8.Items.Add(new CustomComboBoxItem("120", 120));
            this.comboBox8.Items.Add(new CustomComboBoxItem("130", 130));
            this.comboBox8.Items.Add(new CustomComboBoxItem("140", 140));
            this.comboBox8.Items.Add(new CustomComboBoxItem("160", 160));
            this.comboBox8.Items.Add(new CustomComboBoxItem("170", 170));
            this.comboBox8.Items.Add(new CustomComboBoxItem("180", 180));
            this.comboBox8.Items.Add(new CustomComboBoxItem("190", 190));
            this.comboBox8.Items.Add(new CustomComboBoxItem("200", 200));
            this.comboBox8.Items.Add(new CustomComboBoxItem("250", 250));
            this.comboBox8.Items.Add(new CustomComboBoxItem("300", 300));
            this.comboBox8.Items.Add(new CustomComboBoxItem("350", 350));
            this.comboBox8.Items.Add(new CustomComboBoxItem("400", 400));
            this.comboBox8.Items.Add(new CustomComboBoxItem("450", 450));
            //=====min and max year (9 & 10)=============================
            this.comboBox9.Items.Add(new CustomComboBoxItem("1960", 1960));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1965", 1965));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1970", 1970));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1975", 1975));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1980", 1980));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1985", 1985));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1990", 1990));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1995", 1995));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1996", 1996));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1997", 1997));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1998", 1998));
            this.comboBox9.Items.Add(new CustomComboBoxItem("1999", 1999));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2001", 2001));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2002", 2002));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2003", 2003));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2004", 2004));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2005", 2005));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2006", 2006));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2007", 2007));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2008", 2008));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2009", 2009));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2010", 2010));
            this.comboBox9.Items.Add(new CustomComboBoxItem("2011", 2011));

            //============================================================
            this.comboBox10.Items.Add(new CustomComboBoxItem("1960", 1960));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1965", 1965));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1970", 1970));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1975", 1975));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1980", 1980));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1985", 1985));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1990", 1990));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1995", 1995));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1996", 1996));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1997", 1997));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1998", 1998));
            this.comboBox10.Items.Add(new CustomComboBoxItem("1999", 1999));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2000", 2000));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2001", 2001));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2002", 2002));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2003", 2003));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2004", 2004));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2005", 2005));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2006", 2006));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2007", 2007));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2008", 2008));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2009", 2009));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2010", 2010));
            this.comboBox10.Items.Add(new CustomComboBoxItem("2011", 2011));
     // Now The Color Combo Box=(11)============================================
           
             this.comboBox11.Items.Add(new CustomComboBoxItem("Silver","Silver"));
            this.comboBox11.Items.Add(new CustomComboBoxItem("White","White" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Violet","Violet" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Gray", "Gray"));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Yellow","Yellow" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Brown","Brown" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Red", "Red"));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Dark Red","Dark Red" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Lemon Yellow","Lemon Yellow" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Black","Black" ));
            this.comboBox11.Items.Add(new CustomComboBoxItem("Beige","Beige" ));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Dark Blue","Dark Blue" ));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Blue", "Blue"));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Orange","Orange" ));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Green", "Green"));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Dark Green","Dark Green" ));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Pink","Pink" ));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Gold", "Gold"));
             this.comboBox11.Items.Add(new CustomComboBoxItem("Chrome", "Chrome"));
     
             //Kmeters Runned=======12min km  13 max km ==================================================
             this.comboBox12.Items.Add(new CustomComboBoxItem("0",0 ));
             this.comboBox12.Items.Add(new CustomComboBoxItem("5000", 5000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("15000", 15000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("20000", 20000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("30000", 30000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("40000", 40000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("50000", 50000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("60000", 60000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("70000", 70000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("80000", 80000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("90000", 90000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("100000", 100000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("125000", 125000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("150000", 150000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("175000", 175000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("200000", 200000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("300000", 300000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("400000", 400000));
             this.comboBox12.Items.Add(new CustomComboBoxItem("500000", 500000));
            //==========================================================================
             this.comboBox13.Items.Add(new CustomComboBoxItem("0", 0));
             this.comboBox13.Items.Add(new CustomComboBoxItem("5000", 5000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("15000", 15000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("20000", 20000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("30000", 30000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("40000", 40000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("50000", 50000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("60000", 60000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("70000", 70000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("80000", 80000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("90000", 90000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("100000", 100000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("125000", 125000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("150000", 150000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("175000", 175000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("200000", 200000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("300000", 300000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("400000", 400000));
             this.comboBox13.Items.Add(new CustomComboBoxItem("500000", 500000));
            




        }

        private void button2_Click(object sender, EventArgs e)
        {
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem ComboMaker = (CustomComboBoxItem)this.comboBox1.SelectedItem;
            int code = Convert.ToInt32(ComboMaker.tag.ToString());
            Car1.maker = code;

            this.comboBox2.Items.Clear();
            
            localhost2.modelws modelz = new localhost2.modelws();
            localhost2.Maker Maker1 = new localhost2.Maker();

            code = Convert.ToInt32(ComboMaker.tag.ToString());
            Maker1.maker = code;

            localhost2.reply mm = new localhost2.reply();
            try
            {
                mm = modelz.models(Maker1);
                //MessageBox.Show(mm.reply0);
                
                string mod_row = mm.reply0;
                string[] models = mod_row.Split(new string[] { "&" }, StringSplitOptions.None);
                int mod_num = models.Length;
                int i = 0;
                for (i = 0; i < mod_num; i++)
                {
                    string[] model_data = models[i].Split(new string[] { "_" }, StringSplitOptions.None);
                    this.comboBox2.Items.Add(new CustomComboBoxItem(model_data[0], model_data[0]));
                }
            }
            catch
            {
                MessageBox.Show("Failed To Load Models From www.alekz.eu/carz \n Check You Internet Connection","Error",MessageBoxButtons.OK,MessageBoxIcon.Error);
            }
            
           



        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem ComboModel = (CustomComboBoxItem)this.comboBox2.SelectedItem;
            Car1.model = ComboModel.tag.ToString(); 
        }

        private void button3_Click(object sender, EventArgs e)
        {

            
        }

        private void button4_Click(object sender, EventArgs e)
        {
        }

        private void comboBox8_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem CombomaxP = (CustomComboBoxItem)this.comboBox8.SelectedItem;
            int code = Convert.ToInt32(CombomaxP.tag);
            Car1.max_power = code;
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void comboBox11_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem ComboColor = (CustomComboBoxItem)this.comboBox11.SelectedItem;
            Car1.color = ComboColor.tag.ToString(); 
        }

        private void comboBox3_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combominpr = (CustomComboBoxItem)this.comboBox3.SelectedItem;
            int code = Convert.ToInt32(Combominpr.tag.ToString());
            Car1.min_price = code;
        }

        private void comboBox4_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combomaxpr = (CustomComboBoxItem)this.comboBox4.SelectedItem;
            int code = Convert.ToInt32(Combomaxpr.tag.ToString());
            Car1.max_price = code;
        }

        private void comboBox5_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combomineng = (CustomComboBoxItem)this.comboBox5.SelectedItem;
            int code = Convert.ToInt32(Combomineng.tag.ToString());
            Car1.min_engine = code;
        }

        private void comboBox6_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combomaxeng = (CustomComboBoxItem)this.comboBox6.SelectedItem;
            int code = Convert.ToInt32(Combomaxeng.tag);
            Car1.max_engine = code;
        }

        private void comboBox7_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem CombominP = (CustomComboBoxItem)this.comboBox7.SelectedItem;
            int codey = Convert.ToInt32(CombominP.tag);
            Car1.min_power = codey;
        }

        private void comboBox9_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem CombominY = (CustomComboBoxItem)this.comboBox9.SelectedItem;
            int codeyr = Convert.ToInt32(CombominY.tag);
            Car1.min_year = codeyr;
        }

        private void comboBox10_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem CombomaxY = (CustomComboBoxItem)this.comboBox10.SelectedItem;
            int code = Convert.ToInt32(CombomaxY.tag);
            Car1.max_year = code;
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void link_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            try { System.Diagnostics.Process.Start("http://web2.teiser.gr/webservices/carz"); }
            catch { MessageBox.Show("Check You Internet Connection", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void comboBox12_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combominkm = (CustomComboBoxItem)this.comboBox12.SelectedItem;
            int codekm = Convert.ToInt32(Combominkm.tag);
            Car1.min_km = codekm;
        }

        private void comboBox13_SelectedIndexChanged(object sender, EventArgs e)
        {
            CustomComboBoxItem Combomaxkm = (CustomComboBoxItem)this.comboBox13.SelectedItem;
            int codexkm = Convert.ToInt32(Combomaxkm.tag);
            Car1.max_km = codexkm;
        }
            
    }
}
