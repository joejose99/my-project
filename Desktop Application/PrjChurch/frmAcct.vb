Imports System.Data.OleDb
Public Class frmAcct

    Private Sub frmAcct_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.Left = 0
        Me.Top = 100

        Me.Width = 606
        Me.Height = 278
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub frmAcct_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click

    End Sub

    Private Sub frmAcct_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try

            Me.Left = 0
            Me.Top = 100
            Me.Width = 606
            Me.Height = 278
            Me.MdiParent = mdiChurch

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Acct]"
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()
                str_sql_user_select = "SELECT * FROM  acct "

                ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    'Me.TextBox1.Text = myAccessReader("mOffering")
                    'Me.TextBox2.Text = myAccessReader("mOtherExp")
                    'Me.TextBox3.Text = myAccessReader("mBalance")
                    'Me.TextBox4.Text = myAccessReader("mTithe")
                    'Me.TextBox5.Text = myAccessReader("mSalary")

                    Me.TextBox1.Text = Format(Val(myAccessReader("mOffering")))
                    Me.TextBox2.Text = Format(Val(myAccessReader("mOtherExp")))
                    Me.TextBox3.Text = Format(Val(myAccessReader("mBalance")))
                    Me.TextBox4.Text = Format(Val(myAccessReader("mTithe")))
                    Me.TextBox5.Text = Format(Val(myAccessReader("mSalary")))
                    Me.TextBox6.Text = Format(Val(myAccessReader("mPledges")))

                    Me.TextBox8.Text = Format(Val(myAccessReader("mIncome")))



                    ro += 1

                End While


                strconss.Close()
                myAccessReader.Close()
            End If

            Call Unredeem()
           
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub
    Private Sub Unredeem()
        Dim rows As Integer
        Call conns()

        str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [FinPledge]"
        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
        ' myreader = comUserSelect.ExecuteReader()

        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
        myAccessReader = comUserSelectS.ExecuteReader()


        While myAccessReader.Read
            rows = myAccessReader("RecordCount")
        End While
        strconss.Close()
        myAccessReader.Close()
        If rows <> 0 Then

            Call conns()
            str_sql_user_select = "SELECT sum(mAmount) AS [RecordCount] FROM  [FinPledge]"
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read
                TextBox7.Text = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
        End If
    End Sub
    Private Sub query()
        Try



            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Acct]"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()
                str_sql_user_select = "SELECT * FROM  acct "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()


                Dim ro As Integer = 0
                While myAccessReader.Read()


                    'Me.TextBox1.Text = myAccessReader("mOffering")
                    'Me.TextBox2.Text = myAccessReader("mOtherExp")
                    'Me.TextBox3.Text = myAccessReader("mBalance")
                    'Me.TextBox4.Text = myAccessReader("mTithe")
                    'Me.TextBox5.Text = myAccessReader("mSalary")

                    Me.TextBox1.Text = Format(Val(myAccessReader("mOffering")))
                    Me.TextBox2.Text = Format(Val(myAccessReader("mOtherExp")))
                    Me.TextBox3.Text = Format(Val(myAccessReader("mBalance")))
                    Me.TextBox4.Text = Format(Val(myAccessReader("mTithe")))
                    Me.TextBox5.Text = Format(Val(myAccessReader("mSalary")))
                    Me.TextBox6.Text = Format(Val(myAccessReader("mPledges")))
                    Me.TextBox8.Text = Format(Val(myAccessReader("mIncome")))


                    ro += 1

                End While


                strconss.Close()
                myAccessReader.Close()
            End If

            Call Unredeem()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub PrintPreviewControl1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub


    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub Label5_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Label5.Click

    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer



    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String
    Private fntBold As New Font("Arial", 9)
    Private ypos As Integer
    Private xpos As Integer



    Private Yc As Integer



    Public Sub PrintBIll()
        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Outstanding Fees Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3
        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()
        End If
        If printNo = 1 Then
            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()
        End If




    End Sub

    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        Try
            Sch_name()
            printNo = 1
            Dim Choices As String = ""
            Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

            If Choices = vbYes Then

                PrintBIll()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        Try
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            'e.Graphics.DrawString(course_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString("ACCOUNT DETAILS", headfont, Brushes.Black, X1 + 180, Y + 70)

            With PrintDocument1.DefaultPageSettings
                e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                .PaperSize.Width - .Margins.Right, Y + 95)
            End With


            'e.Graphics.DrawString("STUDENT DETAILS", headfont, Brushes.Black, X1 + 210, Y)

            e.Graphics.DrawString("TOTAL OFFERING PAID : ", tablefont, Brushes.Black, X1, Y + 110)
            e.Graphics.DrawString(Me.TextBox1.Text, titlefont, Brushes.Black, X1 + 170, Y + 110)

            e.Graphics.DrawString("TOTAL SALARY PAID : ", tablefont, Brushes.Black, X1, Y + 150)
            e.Graphics.DrawString(Me.TextBox5.Text, titlefont, Brushes.Black, X1 + 170, Y + 150)


            e.Graphics.DrawString("OTHER EXPENSES : ", tablefont, Brushes.Black, X1, Y + 190)
            e.Graphics.DrawString(Me.TextBox2.Text, titlefont, Brushes.Black, X1 + 170, Y + 190)

            e.Graphics.DrawString("TOTAL INCOME : ", tablefont, Brushes.Black, X1, Y + 230)
            e.Graphics.DrawString(Me.TextBox8.Text, titlefont, Brushes.Black, X1 + 170, Y + 230)


            e.Graphics.DrawString("TOTAL TITHE : ", tablefont, Brushes.Black, X1 + 300, Y + 110)
            e.Graphics.DrawString(TextBox4.Text, titlefont, Brushes.Black, X1 + 450, Y + 110)

            e.Graphics.DrawString("TOTAL REDEEM PLEDGE : ", tablefont, Brushes.Black, X1 + 300, Y + 150)
            e.Graphics.DrawString(Me.TextBox7.Text, titlefont, Brushes.Black, X1 + 450, Y + 150)


            e.Graphics.DrawString("TOTAL BALANCE : ", tablefont, Brushes.Black, X1 + 300, Y + 190)
            e.Graphics.DrawString(Me.TextBox3.Text, titlefont, Brushes.Black, X1 + 450, Y + 190)


            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 60



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private course_name As String
    Private Sub Sch_name()



        Call conns()
        ' str_sql_user_select = "SELECT distinct(vDepartCode)UPPER(vDepartName)  FROM department where  vDepartCode= '" & txtDptCode.Text.Trim & "'" & ""

        str_sql_user_select = "SELECT distinct(vSC_Name) AS DEPARTNAME FROM School_Name "

        'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

        ' myreader = comUserSelect.ExecuteReader()
        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
        myAccessReader = comUserSelectS.ExecuteReader()


        Dim ro As Integer = 0
        While myAccessReader.Read()

            course_name = myAccessReader("DEPARTNAME")

            ro += 1

        End While
        myAccessReader.Close()

        strconss.Close()
    End Sub

    Private Sub butRefresh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butRefresh.Click
        query()
    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0
        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        PrintBIll()
    End Sub

    Private Sub Label21_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub

    Private Sub TextBox3_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox3.TextChanged

    End Sub
End Class